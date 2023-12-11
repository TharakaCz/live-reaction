<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Repository\Eloquent\UsersRepository;
use App\Services\UserService;
use Creativeorange\Gravatar\Facades\Gravatar;

class UsersServiceImpl extends BaseServiceImpl implements UserService
{
    private $usersRepository;
    public function __construct(UsersRepository $repository)
    {
        $this->usersRepository = $repository;
    }

    public function create($data)
    {
        $user = new User();
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->address_1 = $data->address;
        $user->avatar = Gravatar::get($user->email, ['size' => 500]);
        $user->avatar_type = User::gravatar;

        try {
            if (!$user->save()){
                return $this->sendResponse(false, 500, "Saving fail.");
            }
            return $this->sendResponse(true, 200, "Saving success.");
        }catch (\Exception $ex){
            return $this->sendResponse(false, 500, $ex->getMessage());
        }
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
