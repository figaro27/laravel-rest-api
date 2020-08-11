<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;

use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function save(Request $request)
    {
        //Validate requested data
        $user = auth()->user();
        print($user->id);

        $input = $request->all();
        $person = Person::create($input);
        $response =  $person->all();
        return $response;
    }
}
