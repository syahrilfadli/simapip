<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyController extends Controller
{
    public function index()
    {
        return view('Template.Verify');
    }
    public function verification(Request $request)
    {
        return redirect('/load-login');
    }
}
