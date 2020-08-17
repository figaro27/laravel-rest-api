<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IngredientPatterns;

class IngredientPatternsController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $ingredientPatterns = $request->all();
        $ingredientPatterns['created_by'] = $user->id;
        $ingredientPatterns['updated_by'] = $user->id;
        $response = IngredientPatterns::create($ingredientPatterns);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['updated_by'] = $user->id;
        $result = IngredientPatterns::find($id)->update($input);
        $ingredientPatterns = IngredientPatterns::find($id);
        $response['status'] = true;
        $response['data'] = $ingredientPatterns;
        return $response;
    }
}
