<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function Brand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brands.index',compact('brands'));
    }
    public function storeBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name'=>'required|unique:brands|min:4',
            'brand_image'=>'required|mimes:jpg,jpeg,png',
        ],[
            'brand_name.required'=>'Пожалуйста, введите название бренда.',
            'brand_image.min'=> 'Название бренда должно быть больше 4 символов.',
        ]);

        $brand_image = $request->file('brand_image');
        /*
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        */

        $name_generate = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_generate);
        $last_img = 'image/brand/'.$name_generate;

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=> $last_img,
            'created_at'=> Carbon::now(),
            ]);
        return Redirect()->back()->with('success','Бренд успешно устаовлен.');
    }
    public function editBrand($id)
    {
        $brands = Brand::find($id);
        return view('admin.brands.edit',compact('brands'));
    }
    public function updateBrand(Request $request, $id)
    {
        $validateData = $request->validate([
            'brand_name'=>'required|min:4',
        ],[
            'brand_name.required'=>'Пожалуйста, введите название бренда.',
            'brand_image.min'=> 'Название бренда должно быть больше 4 символов.',
        ]);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if ($brand_image)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=> $last_img,
                'created_at'=> Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Бренд успешно обновлен.');
        } else {
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=> Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Бренд успешно обновлен.');
        }
    }
    public function deleteBrand($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Выбранный Вами бренд был успешно удалён.');
    }
}
