<?php

namespace App\Http\Controllers;

use App\Pad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PadController extends Controller
{
    private $rules = [
        'name' => 'required|max:255|min:5|unique:pads',
    ];

    private function _isMine(Pad $pad)
    {
        if (Gate::forUser(Auth::user())->denies('isMine', $pad)) {
            return ["code" => 404, "msg" => 'Item doesn\'t exist'];
        }
        return;
    }

    public function index()
    {
        return view('pad/list', ['list' => Pad::isMine()->get()]);
    }

    public function create()
    {
        return view('pad/create');
    }

    public function store(Request $req)
    {
        $this->validate($req, $this->rules);
        $pad = new Pad;
        $pad->name = $req->name;
        $pad->user_id = Auth::id();
        $pad->save();
        return redirect('pad/'.$pad->id);
    }

    public function show(Pad $pad)
    {
        if ($error = $this->_isMine($pad)) return view('errors/any', $error);
        return view('pad/show', ['pad' => $pad]);
    }

    public function edit(Pad $pad)
    {
        if ($error = $this->_isMine($pad)) return view('errors/any', $error);
        return view('pad/edit', ['pad' => $pad]);
    }

    public function update(Request $req, Pad $pad)
    {
        if ($error = $this->_isMine($pad)) return view('errors/any', $error);
        $this->validate($req, $this->rules);
        $pad->name = $req->name;
        $pad->save();
        return redirect('pad/'.$pad->id);
    }

    public function confirm($id)
    {
        if ($error = $this->_isMine($pad)) return view('errors/any', $error);
        return view('pad/confirm', ['pad' => Pad::find($id)]);
    }

    public function destroy(Pad $pad)
    {
        if ($error = $this->_isMine($pad)) return view('errors/any', $error);
        $pad->delete();
        return redirect('pad');
    }
}
