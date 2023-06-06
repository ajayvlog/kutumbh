<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    public function createNotes(Request $req)
    {
        $req->validate([
            'user_id' => 'required',
            'notes' => 'required',
        ]); 

        $mynotes = new Note;
        
        $mynotes->user_id = $req->get('user_id');
        $mynotes->notes = $req->get('notes');
        $mynotes->save();

        return back()
            ->with('success','Note has been Created.');
    }
}
