<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::where('role', '1')->get();

        return view("admin.users.admin")->with("users", $users);
    }
    public function users()
    {
        $users = User::where('role', '0')->get();

        return view("users")->with("users", $users);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect("/users");
    }
    public function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'district' => 'required',
            'password' => 'required',
        ]);

        $users = User::where('email', $request->email)->get();
        if (count($users) > 0) {
            return "Email Already taken";
        }

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->district = $request->district;
        $user->role = '1';
        $user->password = Hash::make($request->password);

        // $user->name = $request->fullname;
        $user->save();

        return back()->with("success", "user registered successfully");
    }
}
