<?php

namespace App\Repository;

use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Collection;

interface UsersRepositoryInterface
{

    public function save($data);
    public function all(): Collection;
}
