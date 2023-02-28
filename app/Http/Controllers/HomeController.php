<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function show(){
        return view('home.home');
    }
    public function menu(){
        return view('home.menu');
    }
}
