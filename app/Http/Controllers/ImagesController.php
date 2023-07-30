<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function Images()
    {
        $images = Image::all();
        return view('admin.images.index',compact('images'));
    }
    public  function allImages(Request $request)
    {
        $images = $request->file('images');
        foreach ($images as $image)
        {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            \Image::make($image)->resize(200,140)->save('image/all_images/'.$name_gen);
            $last_img = 'image/all_images/'.$name_gen;
            Image::insert([
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
        }

        return Redirect()->back()->with('success','Изображения были успешно установлены.');
    }
}
