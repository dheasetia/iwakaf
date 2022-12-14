<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Resources\BioResource;
use App\Http\Resources\UserResource;
use App\Models\Bio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterPostRequest $request)
    {
        $first_name = strtolower($request->first_name);
        $last_name = strtolower($request->last_name);

        $user = User::create([
            'first_name'  => ucfirst($first_name),
            'last_name'  => ucfirst($last_name),
            'email' => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $bio = Bio::where('user_id', '=', $user->id)->first();
        if ($bio == null) {
            $bio = new Bio();
            $bio->first_name = $user->first_name;
            $bio->last_name = $user->last_name;
            $bio->user_id = $user->id;
            $bio->phone = $request->phone;
            $bio->save();
        } else {
            $bio->first_name = $user->first_name;
            $bio->last_name = $user->last_name;
            $bio->user_id = $user->id;
            $bio->phone = $request->phone;
            $bio->save();
        }

        $token = $user->createToken(env('SALT_TOKEN'))->plainTextToken;
        return response([
            'user'  => new UserResource($user),
            'token' => $token
        ], 201);
    }
    public function login(LoginPostRequest $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'status'    => 'failed',
                'message'   => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('iwakafisalamfoundation')->plainTextToken;
        return response([
            'status'    => 'success',
            'user'  => new UserResource($user),
            'token' => $token
        ], 200);

    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ]);
    }
    public function me(Request $request)
    {
        $user = new UserResource($request->user());
        return response([
            'user'  => $user
        ]);
    }
}
