<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function getUserByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }
    public static function getUserById(string $id)
    {
        return User::where('id', $id)->first();
    }
}
