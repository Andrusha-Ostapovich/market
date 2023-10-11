<?php

namespace App\Http\Controllers\Api;

use App\Events\Registered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = auth()->user();
        $token = $user->createToken('oken')->accessToken;
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'Користувача не знайдено'], 404);
        }

        if (Hash::check($password, $user->password)) {
            return new UserResource($user);
        } else {
            return response()->json(['message' => 'Невірний пароль'], 401);
        }
    }
    public function register(RegisterRequest $request)
    {


        $email = $request->email;
        $email = User::where('email', $email)->first();
        if ($email) {
            return response()->json(['message' => 'Користувач з таким емайлом існує']);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return new UserResource($user);
    }
}
