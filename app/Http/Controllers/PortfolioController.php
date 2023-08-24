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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Portfolio::all();
        return view('admin.portfolio.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Portfolio::find($id);
        return view('admin.portfolio.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_img = $request->old_img;
        $img = $request->file('img');

        if ($img)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/portfolio/';
            $last_img = $up_location.$img_name;
            $img->move($up_location,$img_name);

            //unlink($old_img);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Portfolio::find($id);
        $old_img = $images->img;
        unlink($old_img);
        Portfolio::find($id)->delete();
        return Redirect()->back()->with('success','Выбранное Вами изображение успешно удалено.');
    }
}
