<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Achive;
use Illuminate\Support\Facades\Auth;

class AchiveController extends Controller
{
    public function addAchive($id)
    {
        $achives = new Achive();
        $notes = Note::findOrFail($id);
        $achives->user_id = $notes->user_id;
        $achives->title = $notes->title;
        $achives->notes = $notes->notes;
        $result = $achives->save();
        $notes->delete();
        if($result){
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getAchiveNotes()
    {
        $achives = Achive::where('user_id',Auth::user()->id)->orderBy ('id','DESC')->get();
        return response()->json($achives);
    }

    public function deleteAchives($id)
    {
        $notes = new Note();
        $achives = Achive::findOrFail($id);
        $notes->user_id = $achives->user_id;
        $notes->title = $achives->title;
        $notes->notes = $achives->notes;
        $result = $notes->save();
        $achives->delete();

        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
