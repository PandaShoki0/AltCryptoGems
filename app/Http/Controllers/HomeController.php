<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public $api;
    public $provider;

    public function __construct()
    {
        return Cache::remember('providers', 60*5, function(){
            $thirdparty = getProvider();
            if ($thirdparty) {
                $exchange_class = "\\ccxt\\$thirdparty->title";
                $this->api = new $exchange_class(array(
                    'apiKey' => $thirdparty->api,
                    'secret' => $thirdparty->secret,
                    'password' => $thirdparty->password,
                ));
                $this->provider = $thirdparty->title;
            } else {
                $this->provider = null;
            }
            return $this->provider;
        });
    }


    public function home()
    {
        return view('frontends.liquid-vestor.home_new');


        $frontendPath = GeneralSetting::first()->frontend;
        $htmlContent = File::get(public_path() . $frontendPath);

        // Get the directory path of the HTML file including the last folder
        $baseURL = url(substr($frontendPath, 0, strrpos($frontendPath, '/')));
        $baseTag = '<base href="' . $baseURL . '/">';

        // Add the base tag right after the opening head tag
        $htmlContent = preg_replace('/<head>/', '<head>' . $baseTag, $htmlContent);

        return response($htmlContent)->header('Content-Type', 'text/html');
    }

    public function blog() 
    {
        return view('frontends.liquid-vestor.blog');
    }

    public function blogDetail($slug) {
        $data['post'] = null;
        try {
            $posts =  Cache::remember("posts", 60*5, function(){
                $endpoint = "https://jupitarfinance.com/api/thecollectionv1/posts";
                $content = Http::post($endpoint);
                return json_decode($content->body());
            });
            $data['post'] = collect($posts)->where('slug', $slug)->first();

        } catch (\Throwable $th) {
            // throw $th;
        }
        return view('frontends.liquid-vestor.blog-detail', $data);

    }

    public function contact(Request $request)
    {
        if ($request->method() == 'POST') {
            $email = $request->email;
            $subject = $request->subject;
            $body = $request->message;
            $headers = "From: $email" . "\r\n" .
            "CC: $email";
            try {

                mail("info@thecollectiveportfolio.com",$subject,$body,$headers);
                // Mail::raw($body, function ($message) use ($email, $subject) {
                //     $message->from($email);
                //     $message->to('info@thecollectiveportfolio.com')->subject($subject);
                // });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return view('frontends.liquid-vestor.contact');
    }


    public function maintenance()
    {
        $page_title = "Under Maintenance";
        return view('errors.maintenance', compact('page_title'));
    }

    public function trade($symbol, $currency)
    {
        $page_title = 'Dashboard';
        $thirdparty = getProvider();
        $thirdpartyFutures = getProviderFutures();
        $provider = $thirdparty ? $thirdparty->title : 'kucoin';
        $providerFutures = $thirdpartyFutures ? $thirdpartyFutures->title : 'kucoinfutures';
        $tradingWallet = $thirdparty != null ? 1 : 0;
        $gnl_cur = GetCurrency();
        return view('layouts.trade', compact('page_title', 'provider', 'tradingWallet', 'gnl_cur', 'providerFutures'));
    }

    public function banned(Request $request)
    {
        return view('errors.407');
    }

    public function seoEdit()
    {
        $page_title = 'SEO Metadata';
        $seo = Frontend::where('data_keys', 'seo.data')->first();
        if (!$seo) {
            $data_values = '{"keywords":["admin","blog"],"description":"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit","social_title":"WEBSITENAME","social_description":"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit","image":null}';
            $data_values = json_decode($data_values, true);
            $frontend = new Frontend();
            $frontend->data_keys = 'seo.data';
            $frontend->data_values = $data_values;
            $frontend->save();
        }
        return view('admin.setting.seo', compact('page_title', 'seo'));
    }
    public function frontendContent(Request $request, $key)
    {
        $purifier = new \HTMLPurifier();
        $valInputs = $request->except('_token', 'image_input', 'key', 'status', 'type', 'id');
        foreach ($valInputs as $keyName => $input) {
            if (gettype($input) == 'array') {
                $inputContentValue[$keyName] = $input;
                continue;
            }
            $inputContentValue[$keyName] = $purifier->purify($input);
        }
        $type = $request->type;
        if (!$type) {
            abort(404);
        }
        $validation_rule = [];
        $validation_message = [];
        foreach ($request->except('_token', 'video') as $input_field => $val) {
            if ($input_field == 'has_image' && $imgJson) {
                foreach ($imgJson as $imgValKey => $imgJsonVal) {
                    $validation_rule['image_input.' . $imgValKey] = ['nullable', 'image', 'mimes:jpeg,jpg,png'];
                    $validation_message['image_input.' . $imgValKey . '.image'] = inputTitle($imgValKey) . ' must be an image';
                    $validation_message['image_input.' . $imgValKey . '.mimes'] = inputTitle($imgValKey) . ' file type not supported';
                }
                continue;
            } elseif ($input_field == 'seo_image') {
                $validation_rule['image_input'] = ['nullable', 'image', 'mimes:jpeg,jpg,png'];
                continue;
            }
            $validation_rule[$input_field] = 'required';
        }
        $request->validate($validation_rule, $validation_message, ['image_input' => 'image']);
        if ($request->id) {
            $content = Frontend::findOrFail($request->id);
        } else {
            $content = Frontend::where('data_keys', $key . '.' . $request->type)->first();
            if (!$content || $request->type == 'element') {
                $content = new Frontend();
                $content->data_keys = $key . '.' . $request->type;
                $content->save();
            }
        }
        if ($type == 'data') {
            $inputContentValue['image'] = @$content->data_values->image;
            if ($request->hasFile('image_input')) {
                try {
                    $inputContentValue['image'] = uploadImg($request->image_input, imagePath()['seo']['path'], imagePath()['seo']['size'], @$content->data_values->image);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload the Image.'];
                    return back()->withNotify($notify);
                }
            }
        } else {
            if ($imgJson) {
                foreach ($imgJson as $imgKey => $imgValue) {
                    $imgData = @$request->image_input[$imgKey];
                    if (is_file($imgData)) {
                        try {
                            $inputContentValue[$imgKey] = $this->storeImage($imgJson, $type, $key, $imgData, $imgKey, @$content->data_values->$imgKey);
                        } catch (\Exception $exp) {
                            $notify[] = ['error', 'Could not upload the Image.'];
                            return back()->withNotify($notify);
                        }
                    } else if (isset($content->data_values->$imgKey)) {
                        $inputContentValue[$imgKey] = $content->data_values->$imgKey;
                    }
                }
            }
        }
        $content->data_values = $inputContentValue;
        $content->save();
        $notify[] = ['success', 'Content has been updated.'];
        return back()->withNotify($notify);
    }
}
