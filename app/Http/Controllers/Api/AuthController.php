<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
}
