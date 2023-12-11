<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Models\UserLog;
use App\Models\UserPasswordHistory;
use App\Repository\Eloquent\UsersRepository;
use App\Repository\UsersRepositoryInterface;
use App\Services\AuthService;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class AuthServiceImpl extends BaseServiceImpl implements AuthService
{

    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function register($data)
    {
        try {
            $user = new User();
            $user->user_id = Uuid::uuid4();
            $user->first_name = $data->first_name;
            $user->last_name = $data->last_name;
            $user->email = $data->email;
            $user->password = Hash::make($data->password);
            $user->address_1 = $data->address_1;
            $user->avatar = Gravatar::get($data->email, ['size' => 500]);
            $user->avatar_type = User::gravatar;
            $user->token = md5(time().$user->email.$user->user_id);

            DB::beginTransaction();
            if (!$user->save()){
                Log::error('User registration error');
                return $this->sendResponse(false, 500, "User registration fails");
            }

            $userPassword = new UserPasswordHistory();
            $userPassword->user_id = $user->id;
            $userPassword->password = $user->password;

            if (!$userPassword->save()){
                DB::rollBack();
                Log::error('User password history saving fail.');
                return $this->sendResponse(false, 500, "User password history saving fail.");
            }

            $user_log = new UserLog();
            $user_log->user_id = $user->id;
            $user_log->mac_address = substr(exec('getmac'), 0, 17);
            $user_log->ip_address = $data->ip();

            if (!$user_log->save()){
                DB::rollBack();
                Log::error('User log error');
                return $this->sendResponse(false, 500, "User registration fails");
            }

            $user->assignRole($data->grant);
            DB::commit();
            return $this->sendResponse(true, 200, "User registration success.", $user);

        }catch (\Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return $this->sendResponse(false, 500, $ex->getMessage());
        }
    }

    public function login($data)
    {
        if(Auth::attempt(["email" => $data->email, "password" => $data->password], $data->remember)){
            $user = User::query()->find(Auth::user()->id);
            $user_token['token'] = $user->createToken('appToken')->accessToken;
            return $this->sendResponse(true, 200, 'Login success.', [
                'success' => true,
                'token' => $user_token,
                'user' => $user,
            ]);
        }
        return $this->sendResponse(false, 401, 'Failed to authenticate.');
    }

    public function logout($data)
    {
        if (Auth::user()) {
            $data->user()->token()->revoke();
            return $this->sendResponse(true, 200, 'Logged out successfully.');
        }

        return $this->sendResponse(false, 500, 'Logged out fail.');
    }
}
