<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function save(Request $request)
    {
        $user = auth()->user();
        $address = $request->all();
        $address['created_by'] = $user->id;
        $address['updated_by'] = $user->id;
        $response = Address::create($address);
        return $response;
    }
}
