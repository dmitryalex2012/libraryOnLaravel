<?php

namespace App\Services;

use App;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AuthServices
{
    /**
     * Finds user in "users" table. If not - creates new user.
     *
     * @param $user
     * @return Builder|Model|object|null
     */
    public static function findOrCreateUser($user)
    {
        $existingUser = User::query()->where('email', $user->email)->first();

        if ($existingUser) {
            return $existingUser;
        } else {
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make("password"),
            ]);
        }
    }
}
