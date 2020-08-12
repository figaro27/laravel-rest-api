<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function save(Request $request)
    {
        $person = Person::create($request->all());
        return $person;
    }
}
