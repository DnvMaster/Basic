<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = DB::table('services')->latest()->get();
        return view('admin.service.index',compact('services'));
    }
    public function serviceAdd()
    {
        return view('admin.service.create');
    }
    public function serviceCreate(Request $request)
    {
        Service::insert([
            'title' => $request->title,
            'image' => $request->image,
            'paragraph' => $request->paragraph,
            'text' => $request->text,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('service.all')->with('success','Данные о сервисе, успешно добавлены.');
    }
    public function serviceEdit()
    {
        //
    }
    public function serviceUpdate()
    {
        //
    }
    public function serviceDelete()
    {
        //
    }
}
