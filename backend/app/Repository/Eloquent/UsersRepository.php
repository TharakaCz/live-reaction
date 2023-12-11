<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UsersRepositoryInterface;
use Illuminate\Support\Collection;

class UsersRepository extends BaseRepository implements UsersRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function all(): Collection
    {
        // TODO: Implement all() method.
    }

    public function save($data)
    {
        return $this->model->save($data);
    }
}
