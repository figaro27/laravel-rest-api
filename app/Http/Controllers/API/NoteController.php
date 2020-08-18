<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $note = $request->all();
        $note['created_by'] = $user->id;
        $note['updated_by'] = $user->id;
        $response = Note::create($note);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['updated_by'] = $user->id;
        $result = Note::find($id)->update($input);
        $note = Note::find($id);
        $response['status'] = true;
        $response['data'] = $note;
        return $response;
    }

}
