<?php

namespace App\Http\Controllers;

use App\Models\Kiwanja;
use Illuminate\Http\Request;

class KiwanjaController extends Controller
{
    public function view($id)
    {
        $kiwanja = Kiwanja::where('authority_id', $id)->first();
        return view("kiwanja")->with('kiwanja', $kiwanja);
    }

    public function sell(Request $request, $id)
    {
        // dd($request);
        $kiwanja = Kiwanja::where('id', $id)->first();
        $kiwanja->price = $request->price;
        $kiwanja->save();
        return back();
    }
    public function sold(Request $request, $id)
    {
        $kiwanja = Kiwanja::where('id', $id)->first();
        $kiwanja->price = NULL;
        $kiwanja->save();
        return back();
    }


    //
}
