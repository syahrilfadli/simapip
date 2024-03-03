<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductUploadController extends Controller
{
    public function index()
    {
        return view('Template.ProductUpload');
    }
}
