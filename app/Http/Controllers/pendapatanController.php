<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pendapatanController extends Controller
{
    public function index(){
        return view('layouts.pages.pendapatan.index');
    }
}
