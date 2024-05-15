<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function index(Request $request)
  {
    $notes = Note::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
    return response(['notes' => $notes], 200);
  }

  public function create(Request $request)
  {
    // create new notes
    $request->validate([
      'title' => 'required',
      'content' => 'required'
    ]);

    $note = new Note();
    $note->user_id = $request->user()->id;
    $note->title = $request->title;
    $note->content = $request->content;
    $note->save();

    return response(['message' => 'Note Added!', 'note' => $note], 200);
  }
}
