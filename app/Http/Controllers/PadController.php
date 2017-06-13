<?php

namespace App\Http\Controllers;

use App\Pad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PadController extends Controller
{
    public function index()
    {
        return view('pad/list', ['list' => Pad::all()]);
    }

    public function create()
    {
        return view('pad/create');
    }

    public function store(Request $req)
    {
        $pad = new Pad;
        $pad->name = $req->name;
        $pad->user_id = Auth::id();
        $pad->save();
        return redirect('pad/'.$pad->id);
    }

    public function show(Pad $pad)
    {
        return view('pad/show', ['pad' => $pad]);
    }

    public function edit(Pad $pad)
    {
        return view('pad/edit', ['pad' => $pad]);
    }

    public function update(Request $req, Pad $pad)
    {
        $pad->name = $req->name;
        $pad->save();
        return redirect('pad/'.$pad->id);
    }

    public function confirm($id)
    {
        return view('pad/confirm', ['pad' => Pad::find($id)]);
    }

    public function destroy(Pad $pad)
    {
        $pad->delete();
        return redirect('pad');
    }
}
