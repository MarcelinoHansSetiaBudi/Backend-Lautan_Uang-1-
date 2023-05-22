<?php

namespace App\Http\Controllers;

use App\Models\Investors    ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

class InvestorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api_investor', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;

        try {
            if (!$token = auth('api_investor')->attempt($credentials)) {
                return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create token'], 500);
        }

        return response()->json(['success' => true, 'token' => $token]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:investors',
            'password' => 'required|string|min:8',
        ]);

        $investor = new Investors([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $investor->save();

        return response()->json(['message' => 'Investors registered successfully'], 201);
    }

    // ...
}
