<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function Images()
    {
        $images = Image::all();
        return view('admin.images.index',compact('images'));
    }
}
