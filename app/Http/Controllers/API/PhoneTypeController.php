<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhoneType;

class PhonetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhoneType()
    {
        //Get list of blogs
        $phonetype = PhoneType::all();
        $message = 'PhoneType got successfully.';
        $status = true;

        //Call function for response data
        $response = $this->response($status, $phonetype, $message);
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
