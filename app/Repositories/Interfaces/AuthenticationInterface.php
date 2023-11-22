<?php

namespace App\Repositories\Interfaces;

interface AuthenticationInterface
{
    public function login($data);
    public function register($data);
}
