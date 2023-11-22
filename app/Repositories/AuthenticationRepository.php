<?php

namespace App\Repositories;

use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Repositories\Interfaces\AuthenticationInterface;
use Exception;

class AuthenticationRepository implements AuthenticationInterface
{

    public function login($data)
    {
        $user = User::where('email', $data->email)->first();

        if (!$user || !Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken('userLogin')->plainTextToken;
        return new LoginResource($token);
    }

    public function register($data)
    {
        try {
            $checkEmail = User::where('email', $data->email)->get();
            if ($checkEmail->count() > 0) {
                throw ValidationException::withMessages([
                    'message' => 'Email Sudah Digunakan'
                ]);
            }
            $password = Hash::make($data->password);

            $up = User::create([
                'email' => $data->email,
                'username' => $data->username,
                'password' => $password
            ]);
            return RegisterResource::make($up);
        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
