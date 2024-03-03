<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlorgotPasswordController extends Controller
{
    public function index()
    {
            return view('Template.ForgotPassword');
    }
    public function findPassword(Request $request)
    {
        $adminCredential = array('admin@gmail.com');
        
        if($request->email == $adminCredential[0])
        {
            return view('Template./verify');
        }
    }
}
