<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBookRequest;
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
     * Performs the user validation and saving to DB.
     * This class is used for user editing and creating.
     *
     * @param AddUserRequest $request
     * @return Factory|View
     */
    public function userAdded(AddUserRequest $request)
    {
        $user = $request->validated();
        $this->userServices->saveUserDB($request);

        return view('manage.userEdited', [
            'user' => $user
        ]);
    }

    /**
     * Begins the book editing procedure.
     *
     * @param $id
     * @return Factory|View
     */
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
     * This class is used for book editing.
     *
     * @param Request $request
     * @param $oldID
     * @return Factory|View
     */
    public function bookEdited(Request $request, $oldID)
    {
        $book = $this->bookServices->validBook($request, $oldID);

        if (isset($request['book_cover'])) {
            $path = $request->file('book_cover')->store('uploads', 'public');
            $book['book_cover'] = asset('/storage/' . $path);
        }

        $book = $this->bookServices->changeBookCover($book, $oldID);

        return view('manage.bookEdited', [
            'message' => '"' . $book['title'] . '"' . ' book edited.',
        ]);
    }

    /**
     * Adds book to DB.
     *
     * @return Factory|View
     */
    public function addBook()
    {
        return view('manage.addingBook', [
            'book' => [
                'id' => 'id',
                'title' => 'title',
                'author' => 'author',
                'description' => 'description',
                'book_cover' => 'book cover',
                'category' => 'category',
                'language' => 'language',
                'publishing_year' => 'publishing year',
                'created_at' => 'created at'
            ],
            'pageTitle' => 'Book adding'
        ]);
    }

    /**
     * Performs book validation and save to DB.
     * This class is used for book creation.
     *
     * @param AddBookRequest $request
     * @return Factory|View
     */
    public function bookAdded(AddBookRequest $request)
    {
        $book = $request->validated();

        $path = $request->file('book_cover')->store('uploads', 'public');
        $book['book_cover'] = asset('/storage/' . $path);

        $this->bookServices->saveBookDB($book);

        return view('manage.bookEdited', [
            'message' => '"' . $book['title'] . '"' . ' book added.'
        ]);
    }

    /**
     * Deletes book from DB.
     *
     * @param $id
     * @return Factory|View
     */
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
