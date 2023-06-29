<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function login(Request $request)
    {
        $validator = validator::make(
            $request->all(),
            [
                "email" => ['required'],
                "password" => ['required'],
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validator error',
                'data' => $validator->errors(),
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->tokens()->delete();
                $token = $user->createToken('my-app-token')->plainTextToken;
                $data = [
                    'user' => $user,
                    'token' => $token,
                ];
                return response()->json([
                    "status" => true,
                    "message" => "You Was Login Successfully",
                    "icon" => 'success',
                    "data" => $data

                ], 200);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "User Not Found",
                    'icon' => 'error',
                    'data' => []
                ], 401);
            };
        }
    }
    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "name" => ['required', 'string', 'min:3', 'max:20'],
                "email" => ['required', 'email', 'unique:users,email'],
                "password" => ['required', 'string'],
            ],
            [
                "name.required" => "Name is required",
                "name.string" => "Name is not valid",
                "email.required" => "Email is required",
                "email.email" => "Email is not valid",
                "email.unique" => "Email is already exist",
                "password.required" => "Password is required",
            ]
        );
        if (!$validator->fails()) {
            $user = new User();
            $user->name =  $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            // $token = $user->createToken('my-app-token')->plainTextToken;
            return response()->json([
                "status" => true,
                "message" => "You Was Register Successfully",
                "icon" => 'success',
                "data" => [
                    "user" => $user,
                    // "token" => $token,
                ]
            ]);
        } else {
            return response()->json([
                "status" => 401,
                "message" => "Faild Register Please Try Again",
                'icon' => 'error'
            ]);
        }
    }
     public function getUser(){
        return auth()->user();
    }

    function logout()
    {
     return auth()->user()->tokens()->delete();
    }
}
