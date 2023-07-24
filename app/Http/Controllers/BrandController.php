<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function Brands()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brands.index',compact('brands'));
    }
    public function storeBrands(Request $request)
    {
        $validateData = $request->validate([
            'brand_name'=>'required|unique:brands|min:4',
            'brand_image'=>'required|mimes:jpg,jpeg,png',
        ],[
            'brand_name.required'=>'Пожалуйста, введите название бренда.',
            'brand_image.min'=> 'Название бренда должно быть больше 4 символов.',
        ]);
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=> $last_img,
            'created_at'=> Carbon::now(),
            ]);
        return Redirect()->back()->with('success','Бренд успешно устаовлен.');
    }
}
