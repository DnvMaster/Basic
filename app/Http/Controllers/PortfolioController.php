<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $images = Portfolio::all();
        return view('admin.portfolio.index',compact('images'));
    }
    public function Portfolio()
    {
        $portfolios = Portfolio::all();
        return view('page.portfolio', compact('portfolios'));
    }
    public function create()
    {
        return view('admin.portfolio.create');
    }
    public function store(Request $request)
    {
        $img = $request->file('img');
        $name_generate = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(500,600)->save('image/portfolio/'.$name_generate);
        $last_img = 'image/portfolio/'.$name_generate;

        Portfolio::insert([
            'img'=> $last_img,
            'title'=>$request->title,
            'text'=>$request->text,
            'created_at'=> Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Изображение успешно установлено.');
    }
    public function edit($id)
    {
        $edit = Portfolio::find($id);
        return view('admin.portfolio.edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $img = $request->file('img');
        if ($img)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/portfolio/';
            $last_img = $up_location.$img_name;
            $img->move($up_location,$img_name);
            Portfolio::find($id)->update([
                'img'=> $last_img,
                'title'=>$request->title,
                'text'=>$request->text,
                'created_at'=> Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Портфолио успешно обновлено.');
        } else {
            Portfolio::find($id)->update([
                'title'=>$request->title,
                'text'=>$request->text,
                'created_at'=> Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Портфолио успешно обновлено.');
        }
    }
    public function destroy($id)
    {
        $images = Portfolio::find($id);
        $old_img = $images->img;
        unlink($old_img);
        Portfolio::find($id)->delete();
        return Redirect()->back()->with('success','Выбранное Вами изображение успешно удалено.');
    }
}
