<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System;

class SystemController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $system = $request->all();
        $system['created_by'] = $user->id;
        $system['updated_by'] = $user->id;
        $response = System::create($system);
        return $response;
    }
}
