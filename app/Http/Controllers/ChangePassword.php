<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class ChangePassword extends Controller
{
    public function changePassword()
    {
        return view('admin.body.change_password');
    }
    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'old_password'=>'required',
            'password'=> 'required|confirmed',
        ]);
        $hash_password = Auth::user()->password;
        if (Hash::check($request->old_password,$hash_password))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('status','Пароль успешно изменён!');
        }
        else
        {
            return redirect()->back()->with('error','Действующий пароль не является действительным!');
        }
    }
    public function profileUpdate()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);
            if ($user)
            {
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }
    public function userProfileUpdate(Request $request)
    {
           // return Redirect()->back()->with('success','Профиль пользователя, был успешно обновлён.');
    }
}
