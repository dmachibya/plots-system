<?php

namespace App\Http\Controllers;

use App\Models\Authority;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{

    public function index()
    {
        $collection = Authority::all();
        return view("authority")->with("collection", $collection);
    }

    public function create(Request $request, $level)
    {
        $authority = new Authority();
        $authority->name = $request->name;
        $authority->level = $level;
        $authority->parent_level = $request->parent_level;
        $authority->parent_level_id = $request->parent_level_id;
        $authority->save();

        return back()->with("success", "saved successfully");
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
            default:
                # code...
                break;
        }
        if ($current_level == 0) {
            $collection = Authority::where('level', '1')->get();
        } else {
            $collection = Authority::where('level', $current_level + 1)->get();
        }
        return view("authority")->with("collection", $collection)->with("current_level", $current_level)->with("current_level_id", $level_id);
    }
}
