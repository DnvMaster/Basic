<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePassword extends Controller
{
    public function changePassword()
    {
        return view('admin.body.change_password');
    }
    public function updatePassword()
    {
        //
    }
}
