<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function save(Request $request)
    {
        $user = auth()->user();
        $person = $request->all();
        $person['created_by'] = $user->id;
        $person['updated_by'] = $user->id;
        $response = Person::create($person);
        return $response;
    }
}
