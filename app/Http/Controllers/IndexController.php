<?php

namespace App\Http\Controllers;

use App\app\Services\BooksServices;
use App\app\Services\SessionServices;
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

        $filters = SessionServices::filtersFromSession();

        return view('index/index', [
            'books' => $filteredBooks["books"],
            'booksPagesQuantity' => $filteredBooks["booksPagesQuantity"],
            'filters' => $filters
        ]);
    }

    /**
     * Loads books from DB.
     * Performs it filtering according to user filters (accepts with POST method).
     *
     * @param Request $request
     * @return Factory|View
     */
    public function filters(Request $request)
    {
        $requestPost = $request->post();

        $filteredBooks = $this->booksServices->makeBookList($requestPost, null);

        $filters = SessionServices::filtersFromSession();

        return view('index/index', [
            'books' => $filteredBooks["books"],
            'booksPagesQuantity' => $filteredBooks["booksPagesQuantity"],
            'filters' => $filters
            ]);
    }
//    public function filters($filtersIndex)
//    {
//
//        $filters = SessionServices::filtersFromSession();
//
//        return view('index/index', [
//            'books' => $filtersIndex,
//            'booksPagesQuantity' => 1,
//            'filters' => $filters
//        ]);
//    }


    /**
     * Loads books from DB.
     * Rendering view with books list from SELECTED page (accepts page number with GET method).
     *
     * @param $pageNumber
     * @return Factory|View
     */
    public function pagination($pageNumber)
    {
        $filteredBooks = $this->booksServices->makeBookList(null, $pageNumber);

        $filters = SessionServices::filtersFromSession();

        return view('index/index', [
            'books' => $filteredBooks["books"],
            'booksPagesQuantity' => $filteredBooks["booksPagesQuantity"],
            'filters' => $filters
        ]);
    }

}
