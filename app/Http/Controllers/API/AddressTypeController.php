<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AddressType;

class AddressTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddressType()
    {
        //Get list of blogs
        $addresstype = AddressType::all();
        $message = 'AddressType got successfully.';
        $status = true;

        //Call function for response data
        $response = $this->response($status, $addresstype, $message);
        return $response;
    }

    public function response($status, $blog, $message)
    {
        //Response data structure
        $return['success'] = $status;
        $return['data'] = $blog;
        $return['message'] = $message;
        return $return;
    }
}
