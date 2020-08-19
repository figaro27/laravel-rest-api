<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\IngredientColors;

class IngredientController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $ingredient['name'] = $request['name'];
        $ingredient['coverage'] = $request['coverage'];
        $ingredient['purchageprice'] = $request['purchageprice'];
        $ingredient['created_by'] = $user->id;
        $ingredient['updated_by'] = $user->id;
        $res_ingredient = Ingredient::create($ingredient);
        $colorIds = $request['color'];
        foreach ($colorIds as $colorId) {
            $ingredientColor['ingredientid'] = $res_ingredient['id'];
            $ingredientColor['colorid'] = $colorId;
            $ingredientColor['created_by'] = $user->id;
            $ingredientColor['updated_by'] = $user->id;
            $res_ingredientColor = IngredientColors::create($ingredientColor);
        }
        return $res_ingredient;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['updated_by'] = $user->id;
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
