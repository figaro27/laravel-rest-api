<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $ingredient = $request->all();
        $ingredient['created_by'] = $user->id;
        $ingredient['updated_by'] = $user->id;
        $response = Ingredient::create($ingredient);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $result = Ingredient::find($id)->update($input);
        $ingredient = Ingredient::find($id);
        $response['status'] = true;
        $response['data'] = $ingredient;
        return $response;
    }

    public function search($personid)
    {
        $ingredient = Ingredient::where('created_by', $personid);
        $response = $ingredient;
        return $response;
    }
}
