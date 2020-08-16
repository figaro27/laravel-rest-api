<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $person = $request->all();
        $person['created_by'] = $user->id;
        $person['updated_by'] = $user->id;
        $response = Person::create($person);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $result = Person::find($id)->update($input);
        $person = Person::find($id);
        $response['status'] = true;
        $response['data'] = $person;
        return $response;
    }
}
