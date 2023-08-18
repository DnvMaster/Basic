<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $abouts = \DB::table('abouts')->first();
        return view('home',compact('abouts'));
    }
}
