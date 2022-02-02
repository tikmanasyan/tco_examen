<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function register(Request $request) {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];

        $register = User::create($data);
        if($register) {
            return response()->json(['message' => 'Row successfully created']);
        }
    }

    public function login(Request $request) {
        $data = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        if(!Auth::attempt($data)) {
            return response()->json(['message' => 'Incorrect login or password!']);
        }

        return response()->json([
            'user' => Auth::user()
        ]);
    }
}
