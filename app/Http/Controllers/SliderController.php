<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllSliders()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function AddSliders()
    {
        return view('admin.slider.create');
    }
    public function StoreSliders(Request $request)
    {
        $slider_image = $request->file('image');

        $name_generate = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_generate);
        $last_img = 'image/slider/'.$name_generate;

        Slider::insert([
            'title'=>$request->title,
            'description'=> $request->description,
            'image' => $last_img,
            'created_at'=> Carbon::now(),
        ]);
        return Redirect()->route('sliders')->with('success','Слайдер успешно устаовлен.');
    }
}
