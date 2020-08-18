<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Person;

class LeadController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $input = $request->all();
        $input['created_by'] = $user->id;
        $input['updated_by'] = $user->id;
        $lead = Lead::create($lead);
        $response = $this->response("success", $lead, "");
        return $response;
    }

    public function search(Request $request)
    {
       // $user = auth()->user();
       // $lead = Lead::where('created_by', $user->id)->get();
        $lead = Lead::all();
        return $lead;
    }

    public function list(Request $request)
    {
        $user = auth()->user();
        $leads = Lead::where('created_by', $user->id)->get();
        foreach ($leads as $lead) {
            $person = Person::where('id', $lead->personid)->get();
            $lead['person'] = $person;
        }
        $response = $this->response("success", $leads, "");
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $result = Lead::find($id)->update($input);
        $lead = Lead::find($id);
        $response = $this->response("success", $lead, "");
        return $response;
    }

    public function response($status, $data, $message)
    {
        //Response data structure
        $return['success'] = $status;
        $return['data'] = $data;
        $return['message'] = $message;
        return $return;
    }

}
