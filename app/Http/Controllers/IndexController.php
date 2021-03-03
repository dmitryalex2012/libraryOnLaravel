<?php

namespace App\Http\Controllers;

use App\app\Services\BooksServices;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    protected $booksServices;

    public function __construct()
    {
        $this->booksServices = new BooksServices();
    }

    public function index(Request $request)
    {
        $filteredBooks = $this->booksServices->makeBookList(null, null);

        return view('index/index', [
            'books' => $filteredBooks
        ]);
    }

    public function filters(Request $request)
    {
        $filters = $request->post();

        $filteredBooks = $this->booksServices->makeBookList($filters, null);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $filters       /** NEED DELETE!!!!!!! */
        ]);
    }

    public function pageNumberChange(Request $request)
    {
        $pageNumber = $request->post();

        $filteredBooks = $this->booksServices->makeBookList(null, $pageNumber);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => null       /** NEED DELETE!!!!!!! */
        ]);
    }
}
