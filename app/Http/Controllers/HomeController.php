<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //funcion por defecto 
    public function __invoke(){
        return view('home');
    }
}
