<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Person;
use App\Models\Address;
use App\Models\Phone;
use App\Models\LeadDetail;

class LeadController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $input = $request->all();
        $input['created_by'] = $user->id;
        $input['updated_by'] = $user->id;
        $lead = Lead::create($input);
        $response = $lead;
        return $response;
    }

    public function search(Request $request)
    {
       // $user = auth()->user();
       // $lead = Lead::where('created_by', $user->id)->get();
        $lead = Lead::all();
        return $lead;
    }

    public function show($id)
    {
       // $user = auth()->user();
       // $lead = Lead::where('created_by', $user->id)->get();
        $lead = Lead::find($id);
        $person = Person::find($lead['personid']);
        $address = Address::where('personid', $person->id)->get();
        $phone = Phone::where('personid', $person->id)->get();
        $leaddetail = LeadDetail::where('leadid', $lead->id)->get();

        $response['lead'] = $lead;
        $response['person'] = $person;
        $response['leaddetail'] = $leaddetail;
        $response['address'] = $address;
        $response['phone'] = $phone;
        return $response;
    }

    public function list(Request $request)
    {
        $user = auth()->user();
        $leads = Lead::where('created_by', $user->id)->get();
        foreach ($leads as $lead) {
            $person = Person::where('id', $lead->personid)->get();
            $lead['person'] = $person;
        }
        $response = $leads;
        return $response;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $result = Lead::find($id)->update($input);
        $lead = Lead::find($id);
        $response = $lead;
        return $response;
    }

    public function destroy($id)
    {
        //Delete blog
        $lead = Lead::findOrFail($id);
        $lead->delete();


        $response['status'] = 'success';
        return $response;
    }

}
