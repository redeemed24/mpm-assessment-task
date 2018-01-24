<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use JWTAuth;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request){

    	$rules = [
    		"email" => "required|email",
    		"password" => "required"
    	];

    	$input = $request->only('email', 'password');

    	$validator = Validator::make($input, $rules);

    	if($validator->fails()){
    		$error = $validator->message()->toJson();
    		return response()->json([
    			"success" => false,
    			"error" => $error
    		]);
    	}

    	try{
    		$token = JWTAuth::attempt([
    			"email" => $request->email,
    			"password" => $request->password
    		]);

    		if(!$token){
    			return response()->json([
    				"success" => false,
    				"error" => "Invalid login credentials."
    			]);
    		}

    		return response()->json([
    			"success" => true,
    			"data" => [
    				"token" => $token
    			]
    		]);

    	}catch(JWTException $e){
    		return response()->json([
    			"success" => false,
    			"error" => "Something went wrong."
    		], 500);
    	}
    }

    public function logout(Request $request){

    	$rules = [
    		"token" => "required"
    	];

    	$input = $request->only("token");

    	$validator = Validator::make($input, $rules);

    	if($validator->fails()){
    		$error = $validator->message()->toJson();
    		return response()->json([
    			"success" => false,
    			"error" => $error
    		]);
    	}

    	try{
    		JWTAuth::invalidate($request->token);
    		return response()->json([
    			"success" => true
    		]);
    	}catch(JWTException $e){
    		return response()->json([
    			"success" => false,
    			"Failed to logout, please try again."
    		]);
    	}

    }
}
