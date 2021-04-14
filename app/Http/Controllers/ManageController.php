<?php

namespace App\Http\Controllers;

use App\Services\BookServices;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * @param User $userServices
     */
    public function __construct(BookServices $bookServices, User $userServices)
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
        $users = $this->userServices->getUsers();

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
//        $user = $this->userServices->getUser($id);
//        User::where('id', '=', $id);
        $user = DB::table('users')->where('id', $id)->first();

        return view('manage.editUser', [
            'user' => $user
        ]);
    }
}
