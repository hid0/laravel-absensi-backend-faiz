<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    // auth logic
    $validator = Validator::make($request->all(), [
      'email'     => 'required|email',
      'password'  => 'required'
    ]);

    //if validation fails
    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    //get credentials from request
    $credentials = $request->only('email', 'password');

    //if auth failed
    if (!$token = auth()->guard('api')->attempt($credentials)) {
      return response()->json([
        'success' => false,
        'message' => 'Email atau Password Anda salah'
      ], 401);
    }

    //if auth success
    return response()->json([
      'success' => true,
      'user'    => auth()->guard('api')->user(),
      'token'   => $token,
    ], 200);
  }

  public function logout(Request $request)
  {
    $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

    if ($removeToken) {
      //return response JSON
      return response()->json([
        'success' => true,
        'message' => 'Logout Successfully!',
      ]);
    }
  }
}
