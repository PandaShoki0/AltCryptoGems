<?php
$targetDir = './themes/';
$uploadOk = 1;
$response = array();

// Check if a file was uploaded
if (isset($_FILES['templateFile'])) {
    $file = $_FILES['templateFile'];
    $zip = new ZipArchive();
    $filename = $file['tmp_name'];

    // Check if the file is a zip archive
    if ($zip->open($filename) === true) {
        $themeName = pathinfo($file['name'], PATHINFO_FILENAME);
        $targetPath = $targetDir . $themeName;

        // Create the target directory if it doesn't exist
        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0755, true);
        }

        // Extract the zip archive to the target directory
        $zip->extractTo($targetPath);
        $zip->close();
        $response['success'] = true;
        $response['message'] = 'Template uploaded and extracted successfully.';
    } else {
        $response['success'] = false;
        $response['message'] = 'The file is not a valid zip archive.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'No file was uploaded.';
}

// Send the response back to the client
header('Content-Type: application/json');
echo json_encode($response);
