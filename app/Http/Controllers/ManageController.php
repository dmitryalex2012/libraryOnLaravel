<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
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
     * Gets books.
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

    /**
     * Gets users
     *
     * @param Request $request
     * @return Factory|View
     */
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

    /**
     * Gets user for editing.
     *
     * @param $id
     * @return Factory|View
     */
    public function userEditing($id)
    {
        $user = $this->userServices->getUser($id);

        return view('manage.userEditing', [
            'user' => $user['0'],
            'pageTitle' => 'User editing'
        ]);
    }

    /**
     * Performs user data validation and save to DB.
     * This class is used for editing and creating users.
     *
     * @param Request $request
     * @param $oldID
     * @return Factory|View
     */
    public function userEdited(Request $request, $oldID)
    {
        $validator = $this->userServices->validUser($request, $oldID);

        $this->userServices->deleteUserDB($oldID);
        $this->userServices->saveUserDB($request);

        return view('manage.userEdited', [
            'user' => $validator
        ]);
    }

    /**
     * Adds user to DB
     *
     * @return Factory|View
     */
    public function addUser()
    {
        return view('manage.addingUser', [
            'user' => [
                'id' => 'id',
                'name' => 'name',
                'email' => 'email',
                'password' => 'password',
                'created_at' => 'created at data'
            ],
            'pageTitle' => 'User adding'
        ]);
    }

    /**
     * @param AddUserRequest $request
     * @return Factory|View
     */
    public function userAdded(AddUserRequest $request)
    {
        $validated = $request->validated();
        $this->userServices->saveUserDB($request);

        return view('manage.userEdited', [
            'user' => $validated
        ]);
    }

    public function bookEditing($id)
    {
        $book = $this->bookServices->getBook($id);
        $book = $book[0];

        return view('manage.bookEditing', [
            'book' => $book,
            'pageTitle' => 'Book editing'
        ]);
    }

    /**
     * Performs book validation and save to DB.
     * This class is used for editing and creating users.
     *
     * @param Request $request
     * @param $oldID
     * @return Factory|View
     */
    public function bookEdited(Request $request, $oldID)
    {
        $validator = $this->bookServices->validBook($request, $oldID);
        $title = $validator['title'];

        $this->bookServices->bookDelete($oldID);
        $this->bookServices->saveBookDB($validator);

        return view('manage.bookEdited', [
            'message' => "$title" . 'book edited.'
        ]);
    }

    public function addBook()
    {
        return view('manage.bookEdited', [
            'message' => 'book added.'
        ]);
    }

    public function deleteBook($id)
    {
        $book = $this->bookServices->getBook($id);
        $title = $book[0]['title'];

        $this->bookServices->bookDelete($id);

        return view('manage.bookEdited', [
            'message' => "$title" . 'book deleted.'
        ]);
    }
}
