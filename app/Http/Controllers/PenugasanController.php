<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    //
    private $viewBasePath = 'Penugasan';

    public function index()
    {
        return view($this->viewBasePath . '/index');
    }
}
