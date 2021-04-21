<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Services\BookServices;
use App\Services\UserServices;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManageController extends Controller
{
    private $bookServices;

    private $userServices;

    /**
     * Makes Dependency Injection for "Book" model.
     *
     * BookController constructor.
     * @param BookServices $bookServices
     * @param UserServices $userServices
     */
    public function __construct(BookServices $bookServices, UserServices $userServices)
    {
        $this->bookServices = $bookServices;
        $this->userServices = $userServices;
    }

    public function index()
    {
        return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
        return view('manage.dashboard');
    }

    /**
     * Gets books for "books.blade".
     *
     * @param Request $request
     * @return Factory|View
     */
    public function books(Request $request)
    {
        $books = $this->bookServices->getBooks($request);

        return view('manage.books', [
            'books' => $books,
            'request' => [
                'sorting' => $request['sorting'],
                'filtering' => $request['filtering'],
            ]
        ]);
    }

    public function users(Request $request)
    {
        $users = $this->userServices->getUsers($request);

        return view('manage.users', [
            'users' => $users,
            'request' => [
                'sorting' => $request['sorting'],
                'filtering' => $request['filtering'],
            ]
        ]);
    }

    public function editUser($id)
    {
        $user = $this->userServices->getUser($id);

        return view('manage.editUser', [
            'user' => $user['0'],
            'pageTitle' => 'User editing'
        ]);
    }

    /**
     * Performs user data validation and save to DB.
     * This class is used for editing and creating users.
     *
     * @param EditUserRequest $request
     * @param $id
     * @return Factory|View
     */
    public function editedUser(EditUserRequest $request)
    {
//        dd($request['id']);
        $validated = $request->validated();

//        $this->userServices->deleteUserDB($);
        $this->userServices->saveUserDB($request);

        return view('manage.userEdited', [
            'user' => $validated
        ]);
    }

    public function addUser()
    {
        $user = [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
            'created_at' => 'created at data'
        ];
        return view('manage.addingUser', [
            'user' => $user,
            'pageTitle' => 'User adding'
        ]);
    }

    public function userAdded(AddUserRequest $request)
    {
        $validated = $request->validated();
        $this->userServices->saveUserDB($request);

        return view('manage.userEdited', [
            'user' => $validated
        ]);
    }
}
