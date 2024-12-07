<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class ImpersonateController extends Controller
{

    public function __construct()
    {

    }
    
    
    public function impersonateIn($id)
    {
        // URL::current()
        session(['impersonated' => $id, 'backUrl' => URL::previous()]);
    
        return redirect()->to('app');
    }
    
    public function impersonateOut(Request $request)
    {
    
        $back_url = $request->session()->get('backUrl');
    
        $request->session()->forget('impersonated', 'secretUrl');
    
    
        return $back_url ? 
            redirect()->to($back_url) : 
            redirect()->to('admin/dashboard');
    }

}

