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

    public function index()
    {
                $filters = null;    /** NEED DELETE!!!!!!! */
        $filteredBooks = $this->booksServices->makeBookList(null);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $filters       /** NEED DELETE!!!!!!! */
        ]);

    }

    public function filters(Request $request)
    {
        $filters = null;
        if ($request->isMethod('post')){
            $filters = $request->post();
        }

        $filteredBooks = $this->booksServices->makeBookList($filters);


        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $filters       /** NEED DELETE!!!!!!! */
        ]);
    }

    public function notificationSender(Request $request)
    {
        $filters = null;
        if ($request->isMethod('post')){
            $filters = $request->post();
        }

        $filteredBooks = $this->booksServices->makeBookList($filters);


        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $filters       /** NEED DELETE!!!!!!! */
        ]);
    }

}
