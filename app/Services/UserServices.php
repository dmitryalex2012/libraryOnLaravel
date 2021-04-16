<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    /**
     * Gets users list using filters and pagination.
     *
     * @return mixed
     */
    public function getUsers()
    {
        return User::query()->paginate(4);
    }

    /**
     * Gets user from DB
     *
     * @param $id
     * @return array
     */
    public function getUser($id)
    {
        return User::query()->where('id', '=', $id)->get()->toArray();
    }

    /**
     * Saves user data to DB.
     *
     * @param $user
     */
    public function saveUserDB($user)
    {
        DB::table('users')->insert([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'created_at' => $user['created_at']
        ]);

        return;
    }
}
