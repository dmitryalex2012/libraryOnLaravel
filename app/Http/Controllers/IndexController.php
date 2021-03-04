<?php

namespace App\Http\Controllers;

use App\app\Services\BooksServices;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;


class IndexController extends Controller
{
    public $booksServices;

    public function __construct()
    {
        $this->booksServices = new BooksServices();
    }

    /**
     * Loads data from DB and renders "index" page
     *
     * @return Factory|View
     */
    public function index()
    {
        $filteredBooks = $this->booksServices->makeBookList(null, null);

        return view('index/index', [
            'books' => $filteredBooks
        ]);
    }

    /**
     * Loads books from DB. Performs it filtering according to user filters (accepts with POST method).
     *
     * @param Request $request
     * @return Factory|View
     */
    public function filters(Request $request)
    {
        $requestPost = $request->post();

        $filteredBooks = $this->booksServices->makeBookList($requestPost, null);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $requestPost       /** NEED DELETE!!!!!!! */
        ]);
    }


    /**
     * Loads books from DB. Outputs to view list books from selected page (accepts page number with GET method).
     *
     * @param $pageNumber
     * @return Factory|View
     */
    public function pageNumber($pageNumber)
    {
        $filteredBooks = $this->booksServices->makeBookList(null, $pageNumber);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $pageNumber       /** NEED DELETE!!!!!!! */
        ]);
    }

}
