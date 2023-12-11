<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLog;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{

    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function signUp(Request $request){

        $validation = Validator::make($request->all(), [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email|unique:users,email",
            "address_1" => "required|string",
            "password" => ["required", "string",
                Password::min(6)->mixedCase()->symbols()->numbers(),
            ],
            "confirm_password" => ["required", "same:password",
                Password::min(6)->mixedCase()->symbols()->numbers(),
            ],
            "grant" => "required|string",
        ]);

        if ($validation->fails()){
            return $this->sendResponse(false, 401, $validation->messages());
        }

        return $this->authService->register($request);
    }

    public function signIn(Request $request)
    {
        $rules = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => ["required", "string", Password::min(6)
                ->mixedCase()
                ->symbols()
                ->numbers()
            ],
        ]);

        if ($rules->fails()){
            $this->sendResponse(false, 401, 'Validation fails', $rules->messages());
        }

        return $this->authService->login($request);
    }

    public function signOut(Request $request)
    {
        return $this->authService->logout($request);
    }
}
