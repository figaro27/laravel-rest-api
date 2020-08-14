<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadDetail;

class LeadDetailController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $lead = $request->all();
        $lead['created_by'] = $user->id;
        $lead['updated_by'] = $user->id;
        $response = LeadDetail::create($lead);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        //Update Person
        $result = LeadDetail::find($id)->update($input);
        if($result){
            $leaddetail = LeadDetail::find($id);
            $response['status'] = true;
            $response['data'] = $leaddetail;
        }
        else {
            $response['status'] = false;
        }
        return $response;
    }
}
