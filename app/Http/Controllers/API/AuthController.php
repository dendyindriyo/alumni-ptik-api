<?php

namespace App\Http\Controllers\API;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $admin = admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 400);
        }

        $token = $admin->createToken('accesstoken')->plainTextToken;

        return response()->json([
            'message' => 'Login sukses',
            'admin' => $admin,
            'token' => $token,
        ], 200);
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:admin,email',
            'password' => ['required', 'max:16', 'confirmed', RulesPassword::defaults()]
        ]);

        $admin = admin::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $admin->createToken('accesstoken')->plainTextToken;

        $response = [
            'admin' => $admin,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logout sukses'
        ];
    }
}
