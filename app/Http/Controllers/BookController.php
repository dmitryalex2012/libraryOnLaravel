<?php

namespace App\Http\Controllers;

use App\Services\BookServices;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class Book
 *
 * @withPath Eloquent
 */
class BookController extends Controller
{
    private $bookServices;

    /**
     * Makes Dependency Injection for "Book" model.
     *
     * BookController constructor.
     * @param BookServices $bookServices
     */
    public function __construct(BookServices $bookServices)
    {
        $this->bookServices = $bookServices;
    }

    /**
     * Gets books for "books.blade".
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $books = $this->bookServices->getBooks($request);

        return view('index/book', [
            'books' => $books,
            'request' => [
                'sorting' => $request['sorting'],
                'filtering' => $request['filtering'],
                ]
        ]);
    }
}
