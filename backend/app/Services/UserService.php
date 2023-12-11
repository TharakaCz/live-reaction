<?php

namespace App\Services;

interface UserService
{

    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
