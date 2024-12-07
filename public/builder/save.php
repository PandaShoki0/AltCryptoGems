<?php

// Get the upload_max_filesize and post_max_size values from the PHP configuration
$upload_max_filesize = ini_get('upload_max_filesize');
$post_max_size = ini_get('post_max_size');

// Convert the values to bytes
$upload_max_filesize_bytes = min(return_bytes($upload_max_filesize), return_bytes($post_max_size));

// Set MAX_FILE_LIMIT to the minimum of upload_max_filesize and post_max_size
define('MAX_FILE_LIMIT', $upload_max_filesize_bytes);

// Function to convert the size values to bytes
function return_bytes($val)
{
    $val = trim($val);
    $last = strtolower($val[strlen($val) - 1]);
    $val = (int)$val;

    switch ($last) {
        case 'g':
            $val *= 1024;
            // no break
        case 'm':
            $val *= 1024;
            // no break
        case 'k':
            $val *= 1024;
    }

    return $val;
}

function sanitizeFileName($file, $allowedExtension = 'html')
{
    //sanitize, remove double dot .. and remove get parameters if any
    $file = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . preg_replace('@\?.*$@', '', preg_replace('@\.{2,}@', '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $file)));


    //allow only .html extension
    if ($allowedExtension) {
        $file = preg_replace('/\..+$/', '', $file) . ".$allowedExtension";
    }
    return $file;
}

function showError($error)
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die($error);
}

$html   = '';
$file   = '';
$action = '';

if (isset($_POST['startTemplateUrl']) && !empty($_POST['startTemplateUrl'])) {
    $startTemplateUrl = sanitizeFileName($_POST['startTemplateUrl']);
    $html = file_get_contents($startTemplateUrl);
} else if (isset($_POST['html'])) {
    $html = $_POST['html'];

    if (strlen($html) > MAX_FILE_LIMIT) {
        showError("File size exceeds the maximum allowed size of " . MAX_FILE_LIMIT . " bytes!");
    }

    $html = substr($html, 0, MAX_FILE_LIMIT);
}

function addPublicFolderToPath($path)
{
    $public_folder = '/public';
    $builder_folder = '/builder';

    // Check if the public folder is missing before the builder folder
    if (strpos($path, $public_folder . $builder_folder) === false && strpos($path, $builder_folder) !== false) {
        // Add the public folder before the builder folder
        $path = str_replace($builder_folder, $public_folder . $builder_folder, $path);
    }

    return $path;
}

if (isset($_POST['file']) && !empty($_POST['file'])) {
    $file = sanitizeFileName($_POST['file'], false);
    $file = addPublicFolderToPath($file);
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action) {
    //file manager actions, delete and rename
    switch ($action) {
        case 'rename':
            $newfile = sanitizeFileName($_POST['newfile'], false);
            if ($file && $newfile) {
                if (rename($file, $newfile)) {
                    echo "File '$file' renamed to '$newfile'";
                } else {
                    showError("Error renaming file '$file' renamed to '$newfile'");
                }
            }
            break;
        case 'delete':
            if ($file) {
                if (unlink($file)) {
                    echo "File '$file' deleted";
                } else {
                    showError("Error deleting file '$file'");
                }
            }
            break;
        default:
            showError("Invalid action '$action'!");
    }
} else {
    //save page
    if ($html) {
        if ($file) {
            $dir = dirname($file);
            if (!is_dir($dir)) {
                echo "$dir folder does not exist\n";
                if (mkdir($dir, 0777, true)) {
                    echo "$dir folder was created\n";
                } else {
                    showError("Error creating folder '$dir'\n");
                }
            }

            if (file_put_contents($file, $html)) {
                echo "File saved '$file'";
            } else {
                showError("Error saving file '$file'\nPossible causes are missing write permission or incorrect file path!");
            }
        } else {
            showError('Filename is empty!');
        }
    } else {
        showError('Html content is empty!');
    }
}
