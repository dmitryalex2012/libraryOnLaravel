<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserServices
{
    /**
     * Gets users list using filters and pagination.
     *
     * @param $request Request
     * @return mixed
     */
    public function getUsers($request)
    {
        $usersQuery = User::query();

        if ($request->filled('findText')) {
            $usersQuery->where('name', $request['findText']);

        } else {
            if ($request->filled('sorting')) {
                switch ($request['sorting']) {
                    case 'alphabetOrder':
                        $usersQuery->orderBy('name', 'ASC');
                        break;
                    case 'reverseAlphabetOrder':
                        $usersQuery->orderBy('name', 'DESC');
                        break;
                }
            }
            if ($request->filled('filtering')) {
                switch ($request['filtering']) {
                    case 'before2020':
                        $usersQuery->whereYear('created_at', '<=', 2020);
                        break;
                    case 'after2020':
                        $usersQuery->whereYear('created_at', '>', 2020);
                        break;
                }
            }
        }

        $filteredUsers = $usersQuery->paginate(5)->withPath('?' . $request->getQueryString());

        return $filteredUsers;
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

    /**
     * Deletes user from DB by ID
     *
     * @param $id
     */
    public function deleteUserDB($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        return;
    }

    /**
     * Performs user validation after user data changing by superadministrator.
     *
     * @param Request $request
     * @param $oldID
     * @return array
     */
    public function validUser(Request $request, $oldID)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('App\User')->ignore($oldID)
            ],
            'password' => 'required|between:8,64',
            'created_at' => 'required|date'
        ]);

        return $validator;
    }
}
