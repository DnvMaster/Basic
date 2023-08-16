<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = \DB::table('abouts')->latest()->get();
        return view('admin.about.index',compact('abouts'));
    }
}
