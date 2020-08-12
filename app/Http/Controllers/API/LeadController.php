<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function save(Request $request)
    {
        $user = auth()->user();
        $lead = $request->all();
        $lead['created_by'] = $user->id;
        $lead['updated_by'] = $user->id;
        $response = Lead::create($lead);
        return $response;
    }

    public function search(Request $request)
    {
        $user = auth()->user();
        $lead = Lead::where('created_by', $user->id)->get();



        return $lead;
    }
}
