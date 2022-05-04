<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::whereNotIn('role', ['3'])->get();

        return view("admin.users.admin")->with("users", $users);
    }
    public function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'district' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->district = $request->district;
        $user->role = '1';
        $user->password = $request->password;
        // $user->name = $request->fullname;
        $user->save();

        return back()->with("success", "user registered successfully");
    }
}
