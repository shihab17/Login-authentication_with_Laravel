<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class basicController extends Controller
{
    public function index(){
        $title= 'params Test';
        return view('pages.index')->with('title', $title);
    }
    public function cs(){
        return view('pages.cs');
    }
    public function eee(){
        return view('pages.eee');
    }
    public function research(){
        return view('pages.research');
    }
    public function notice(){
        return view('pages.notice');
    }
}
