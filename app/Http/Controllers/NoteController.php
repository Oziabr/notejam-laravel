<?php

namespace App\Http\Controllers;

use App\Note;
use App\Pad;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    private $rules = [
        'name' => 'required|min:10|max:255',
    ];

    private function _extendsMine(Note $note)
    {
        if (Gate::forUser(Auth::user())->denies('extendsMine', $note)) {
            return ["code" => 404, "msg" => 'Item doesn\'t exist'];
        }
        return;
    }

    private function _isMine(Pad $pad)
    {
        if (Gate::forUser(Auth::user())->denies('isMine', $pad)) {
            return ["code" => 404, "msg" => 'Parent item doesn\'t exist'];
        }
        return;
    }

    public function index()
    {
        return view('note/list', ['list' => Note::extendsMine()->get()]);
    }

    public function create(Request $req)
    {
        $this->validate($req, $this->rules);
        $pads = Pad::where('user_id', Auth::id())->get();
        $pad_id = $req->query() ? $req->query()['pad_id'] : null;
        return view('note/create', ['pad_id' => $pad_id, 'pads' => $pads]);
    }

    public function store(Request $req)
    {
        if ($error = $this->_isMine(Pad::find($req->pad_id))) return view('errors/any', $error);
        $note = new Note;
        $note->name = $req->name;
        $note->text = $req->text ? $req->text : '';
        $note->pad_id = $req->pad_id;
        //$note->user_id = Auth::id();
        $note->save();
        return redirect('note/'.$note->id);
    }

    public function show(Note $note)
    {
        if ($error = $this->_extendsMine($note)) return view('errors/any', $error);
        return view('note/show', ['note' => $note]);
    }

    public function edit(Note $note)
    {
        if ($error = $this->_extendsMine($note)) return view('errors/any', $error);
        $pads = Pad::where('user_id', Auth::id())->get();
        return view('note/edit', ['note' => $note, 'pads' => $pads]);
    }

    public function update(Request $req, Note $note)
    {
        if ($error = $this->_extendsMine($note)) return view('errors/any', $error);
        if ($error = $this->_isMine(Pad::find($req->pad_id))) return view('errors/any', $error);
        $this->validate($req, $this->rules);
        $note->name = $req->name;
        $note->text = $req->text;
        $note->pad_id = $req->pad_id;
        $note->save();
        return redirect('note/'.$note->id);
    }

    public function confirm($id)
    {
        $note = Note::find($id);
        if ($error = $this->_extendsMine($note)) return view('errors/any', $error);
        return view('note/confirm', ['note' => $note]);
    }

    public function destroy(Note $note)
    {
        if ($error = $this->_extendsMine($note)) return view('errors/any', $error);
        $note->delete();
        return redirect('note');
    }
}
