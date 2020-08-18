<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

class AddressController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $address = $request->all();
        $address['created_by'] = $user->id;
        $address['updated_by'] = $user->id;
        $response = Address::create($address);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        //disable primary Address
        if(array_key_exists('primary', $input)){
            if($input['primary'] == true){
                Address::where('personid', $input['personid'])
                    ->where('primary', true)
                    ->update(['primary'=>false]);
            }
        }
        //Update Address
        $user = auth()->user();
        $input['updated_by'] = $user->id;
        $result = Address::find($id)->update($input);
        if($result){
            $address = Address::find($id);
            $response['status'] = true;
            $response['data'] = $address;
        }
        else {
            $response['status'] = false;
        }
        return $response;
    }

    public function getAddressType()
    {
        //Get list of blogs
        $addresstype = DB::table('addresstype')->get();
        $status = true;
        $response['status'] = "sucess";
        $response['data'] = $addresstype;
        return $response;
    }
}
