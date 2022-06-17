<?php

namespace App\Http\Controllers;

use App\Models\Authority;
use App\Models\Kiwanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorityController extends Controller
{

    public function index($id)

    {
        $collection = Authority::where('level', '1')->get();

        if (Auth::user()->role == "1") {
            $collection =
                Authority::where('level', '1')->where("id", Auth::user()->district)->get();
        }
        return view("authority")->with("collection", $collection);
    }
    public function plots()

    {
        $collection = Authority::where('level', '5')->get();

        if (Auth::user()->role == "1") {
            $collection =
                Authority::where('level', '5')->where("parent_level_id", Auth::user()->district)->get();
        }
        if (Auth::user()->role == "0") {
            $collection =
                Authority::where('level', '5')->where("owner", Auth::user()->id)->get();
        }
        return view("authority")->with("collection", $collection);
    }
    public function delete($id)

    {
        $collection = Authority::find($id);
        $collection->delete();

        return back();
    }

    public function create(Request $request, $level)
    {
        $authority = new Authority();
        $authority->name = $request->name;
        $authority->level = $request->level;
        $authority->owner = $request->owner;
        $authority->parent_level = $request->parent_level;
        $authority->parent_level_id = $request->parent_level_id;
        $authority->save();

        if ($request->level == 5) {
            $kiwanja = new Kiwanja();
            $kiwanja->user_id = $request->owner;
            $kiwanja->authority_id = $authority->id;
            $kiwanja->conflict = 0;
            $kiwanja->save();
            // $kiwanja->confict = 0;
        }

        return back()->with("success", "saved successfully");
    }

    public function update(Request $request, $id)
    {
        $authority = Authority::find($id);
        $authority->name = $request->name;
        $authority->level = $request->level;
        $authority->owner = $request->owner;
        $authority->parent_level = $request->parent_level;
        $authority->parent_level_id = $request->parent_level_id;
        $authority->save();

        if ($request->level == 5) {
            $kiwanja = new Kiwanja();
            $kiwanja->user_id = $request->owner;
            $kiwanja->authority_id = $authority->id;
            $kiwanja->conflict = 0;
            $kiwanja->save();
            // $kiwanja->confict = 0;
        }

        return redirect("/authority/0");
    }

    public function edit($level, $level_id)
    {
        $item = Authority::where('id', $level_id)->first();

        return view("edit_authority")->with("item", $item)->with("level", $level);
    }
    public function view($level, $level_id)
    {
        $current_level = 0;
        switch ($level) {
            case 1:
                $current_level = 1;
                # code...
                break;
            case 2:
                $current_level = 2;
                # code...
                break;
            case 3:
                $current_level = 3;
                # code...
                break;
            case 4:
                $current_level = 4;
                # code...
                break;

            case 5:
                return redirect("/kiwanja/" . $level_id);
                $current_level = 4;
                # code...
                break;

            default:

                # code...
                break;
        }
        if ($current_level == 0) {
            $collection = Authority::where('level', '1')->get();
        } else {
            $collection = Authority::where('parent_level_id', $level_id)->get();
        }
        return view("authority")->with("collection", $collection)->with("current_level", $current_level)->with("current_level_id", $level_id);
    }
}
