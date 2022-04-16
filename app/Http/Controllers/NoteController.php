<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $notes=new Note();
        $notes->user_id=Auth::user()->id;
        $notes->title=$request->title;
        $notes->notes=$request->notes;
        $result=$notes->save();
        if($result){
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }

    public function getNotes()
    {
        $notes = Note::where('user_id', Auth::user()->id)->with('user')->get();
        return response()->json($notes);
    }

    public function edit($id)
    {
        $notes = Note::findOrFail($id);
        return response()->json($notes);
    }

    public function cloneNotes($id)
    {
        $notes = Note::findOrFail($id);
        $new_notes = $notes->replicate();
        $new_notes->push();
    }

    public function updateNotes(Request $request, $id)
    {
        $notes = Note::findOrFail($id);
        $notes->title = $request->title;
        $notes->notes = $request->notes;
        $result=$notes->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function deleteNotes($id)
    {
        $notes = Note::findOrFail($id);
        $result=$notes->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
