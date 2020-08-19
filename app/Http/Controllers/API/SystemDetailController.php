<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemDetail;

class SystemDetailController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $systemid = $request['systemid'];
        $ingredients = $request['ingredients'];
        foreach ($ingredients as $ingredient) {
            $systemdetail = $ingredient;
            $systemdetail['systemid'] = $systemid;
            $systemdetail['created_by'] = $user->id;
            $systemdetail['updated_by'] = $user->id;
            $res_systemdetail = SystemDetail::create($systemdetail);
        }
        $response['status'] = "success";
        return $response;
    }
}
