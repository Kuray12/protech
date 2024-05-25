<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        return view('index');
    }
    public function ip(){
        return view('ip');
    }
}
