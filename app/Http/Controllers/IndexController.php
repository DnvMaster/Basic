<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Logout()
    {
        \Auth::logout();
        return Redirect()->route('login')->with('status','Вы успешно вышли из системы.');
    }
}
