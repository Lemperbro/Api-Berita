<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\AuthenticationRepository;

class AuthenticationController extends Controller
{
    private $AuthenticationRepository;

    public function __construct()
    {
        $this->AuthenticationRepository = new AuthenticationRepository;
    }

    public function login(LoginRequest $request)
    {
        $data = $this->AuthenticationRepository->login($request);
        return $data;
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'message' => 'logout successful'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'logout error'
            ]);
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = $this->AuthenticationRepository->register($request);
        return $data;
    }
}
