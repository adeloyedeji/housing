<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

class AuthenticateController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['authenticate', 'refreshToken']]);
    }

    public function index() {
        $users = \App\User::all();

        return $users;
    }    

    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function refreshToken(Request $request) {
        $token = $request->token;
        try{
            $token = JWTAuth::refresh($token);
        }catch(TokenInvalidException $e){
            throw new AccessDeniedHttpException('The token is invalid');
        }
        // return $this->response->withArray(['token'=>$token]);
        return response()->json($token);
    }

    public function getUser(Request $request) {
        return JWTAuth::parseToken()->authenticate();
    }
}
