<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $color = $request->all();
        $color['created_by'] = $user->id;
        $color['updated_by'] = $user->id;
        $response = Color::create($color);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['updated_by'] = $user->id;
        $result = Color::find($id)->update($input);
        $color = Color::find($id);
        $response['status'] = true;
        $response['data'] = $color;
        return $response;
    }

    public function search()
    {
        $user = auth()->user();
        $color = Color::where('created_by', $user->id)->get();
        $response = $color;
        return $response;
    }

}
