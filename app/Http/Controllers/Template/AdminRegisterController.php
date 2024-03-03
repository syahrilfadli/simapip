<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('Template.AdminRegister');
    }
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|min:6|confirmed'
        ]);
        
        if($validate->fails())
        {
            return $validate->errors();
        }
        if($validate)
        {
            return redirect()->to('/load-login');
        }
    }
}
