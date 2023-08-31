<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contactform;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('page.contact',compact('contacts'));
    }
    public function contactForm(Request $request)
    {
        Contactform::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('contact')->with('success','Сообщение успешно отправлено.');
    }
    public function contactMessage()
    {
        $messages = Contactform::all();
        return view('admin.contact.contact_message',compact('messages'));
    }
    public function contactAll()
    {
        $contacts = DB::table('contacts')->latest()->get();
        return view('admin.contact.index',compact('contacts'));
    }
    public function contactAdd()
    {
        return view('admin.contact.create');
    }
    public function contactCreate(Request $request)
    {
        Contact::insert([
            'call' => $request->call,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('contact.all')->with('success','Данные о контакте, успешно добавлены.');
    }
    public function contactEdit($id)
    {
        $edit = Contact::find($id);
        return view('admin.contact.edit',compact('edit'));
    }
    public function contactUpdate(Request $request, $id)
    {
        $update = Contact::insert([
            'call' => $request->call,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('contact.all')->with('success','Данные о контакте успешно обновлены.');
    }
    public function contactDelete($id)
    {
        $delete = Contact::find($id)->delete();
        return Redirect()->route('contact.all')->with('success','Контакт успешно удален.');
    }
    public function contactMessageDelete($id)
    {
        $message = Contactform::destroy($id);
        return Redirect()->route('contact')->with('success','Сообщение успешно удалено.');
    }
}
