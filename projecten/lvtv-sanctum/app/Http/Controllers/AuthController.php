<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        try {
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->save();

            $success = true;
            $message = 'User successfully registered';
            $code = 200;
        } catch (QueryException $ex) {
            $success = false;
            $message = 'Registration failed: ' . $ex->getMessage();
            $code = 400;
        }
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }

    public function me()
    {
        $code = 200;
        return response()->json(['user' => Auth::user()], $code);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $success = true;
            $user = Auth::user();
            $message = 'User successfully logged in';
            $code = 200;
        } else {
            $success = false;
            $user = null;
            $message = 'Log in failed';
            $code = 400;
        }

        $response = [
            'success' => $success,
            'message' => $message,
            'user' => $user
        ];
        return response()->json($response, $code);
    }

    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'User successfully logged out';
            $code = 200;
        } catch (QueryException $ex) {
            $success = false;
            $message = 'Log out failed: ' . $ex->getMessage();
            $code = 400;
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }
}
