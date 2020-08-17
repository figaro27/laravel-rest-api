<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IngredientColors;

class IngredientColorsController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $ingredientColors = $request->all();
        $ingredientColors['created_by'] = $user->id;
        $ingredientColors['updated_by'] = $user->id;
        $response = IngredientColors::create($ingredientColors);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['updated_by'] = $user->id;
        $result = IngredientColors::find($id)->update($input);
        $ingredientColors = IngredientColors::find($id);
        $response['status'] = true;
        $response['data'] = $ingredientColors;
        return $response;
    }
}
