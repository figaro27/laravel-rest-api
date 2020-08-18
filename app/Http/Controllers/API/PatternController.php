<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pattern;

class PatternController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $pattern = $request->all();
        $pattern['created_by'] = $user->id;
        $pattern['updated_by'] = $user->id;
        $response = Pattern::create($pattern);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['updated_by'] = $user->id;
        $result = Pattern::find($id)->update($input);
        $pattern = Pattern::find($id);
        $response['status'] = true;
        $response['data'] = $pattern;
        return $response;
    }

    public function search($personid)
    {
        $pattern = Pattern::where('created_by', $personid);
        $response = $pattern;
        return $response;
    }
}
