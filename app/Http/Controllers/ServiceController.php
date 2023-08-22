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
            'icon' => $request->icon,
            'title' => $request->title,
            'text' => $request->text,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('service.all')->with('success','Данные успешно добавлены.');
    }
    public function serviceEdit($id)
    {
        $edit = Service::find($id);
        return view('admin.service.edit',compact('edit'));
    }
    public function serviceUpdate(Request $request, $id)
    {
        $update = Service::find($id)->update([
            'icon' => $request->icon,
            'title' => $request->text,
            'text' => $request->text,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('service.all')->with('success','Данные успешно обновлены.');
    }
    public function serviceDelete($id)
    {
        $delete = Service::find($id)->delete();
        return Redirect()->route('service.all')->with('success','Данные раздела сервис, успешно удалены.');
    }
}
