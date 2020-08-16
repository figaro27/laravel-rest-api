<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;

class PhoneController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $phone = $request->all();
        $phone['created_by'] = $user->id;
        $phone['updated_by'] = $user->id;
        $response = phone::create($phone);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        //disable primary phone
        if(array_key_exists('primary', $input)){
            if($input['primary'] == true){
                Phone::where('personid', $input['personid'])
                    ->where('primary', true)
                    ->update(['primary'=>false]);
            }
        }

        //Update Phone
        $result = Phone::find($id)->update($input);
        $phone = Phone::find($id);
        $response['status'] = true;
        $response['data'] = $phone;

        return $response;
    }

    public function getPhoneType()
    {
        //Get list of blogs
        $phonetype = DB::table('phonetype')->get();
        $status = true;
        $response['status'] = "sucess";
        $response['data'] = $phonetype;
        return $response;
    }

}
