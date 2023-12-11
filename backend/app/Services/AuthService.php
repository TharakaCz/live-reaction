<?php

namespace App\Services;

interface AuthService
{
    public function register($data);
    public function login($data);
    public function logout($data);
}
