<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = \DB::table('abouts')->latest()->get();
        return view('admin.about.index',compact('abouts'));
    }
    public function aboutAdd()
    {
        return view('admin.about.create');
    }
    public function aboutCreate(Request $request)
    {
        About::insert([
            'title' => $request->title,
            'about' => $request->about,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('about.all')->with('success','Данные о нас, успешно добавлены.');
    }
}
