<?php


namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
class RegisterController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('AccessToken')->accessToken;
                $response['status'] = "success";
                $response['data']['token'] = $token;
                $response['message'] = "sucess";
                return response($response, 200);
            } else {
                $response['status'] = "error";
                $response["message"] = "Password mismatch";
                return response($response, 422);
            }
        } else {
            $response['status'] = "error";
            $response["message"] = "User does not exist";
            return response($response, 422);
        }
    }

    public function logout (Request $request) {
        $request->user()->token()->revoke();
        $response['status'] = 'success';
        $response['message'] = 'You have been successfully logged out!';
        return response($response, 200);
    }

    public function register(Request $request)
    {
        //Validate requested data
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            $response['status'] = "error";
            $response['message'] = $validator->errors();
            return $response;
        }

        $input = $request->all();
        $count_email = User::where('email', $input['email'])->count();
        if($count_email > 0){
            $response['status'] = "error";
            $response['message'] = "Email already exists!";
            return $response;
        }

        $input['password'] = Hash::make($request['password']);
        $user = User::create($input);
        $response['token'] =  $user->createToken('AccessToken')->accessToken;
        $response['name'] =  $user->name;
        $response['status'] = "success";
        $response['message'] = "User registered successfully.";
        return $response;
    }
}
