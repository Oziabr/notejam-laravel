<?php

namespace App\Http\Controllers;

use App\Note;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    private $rules = [
        'name' => 'required|min:10|max:255',
    ];

    public function index()
    {
        return view('note/list', ['list' => Note::all()]);
    }

    public function create(Request $req)
    {
        $this->validate($req, $this->rules);
        $pad_id = $req->query() ? $req->query()['pad_id'] : null;
        return view('note/create', ['pad_id' => $pad_id]);
    }

    public function store(Request $req)
    {
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
        return view('note/show', ['note' => $note]);
    }

    public function edit(Note $note)
    {
        return view('note/edit', ['note' => $note]);
    }

    public function update(Request $req, Note $note)
    {
        $this->validate($req, $this->rules);
        $note->name = $req->name;
        $note->text = $req->text;
        $note->pad_id = $req->pad_id;
        $note->save();
        return redirect('note/'.$note->id);
    }

    public function confirm($id)
    {
        return view('note/confirm', ['note' => Note::find($id)]);
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect('note');
    }
}
