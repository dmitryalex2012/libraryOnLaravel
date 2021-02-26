<?php

namespace App\Http\Controllers;

use App\app\Models\Books;
use App\app\Services\BooksServices;

class IndexController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Books();
    }

    public function index()
    {
        $books = $this->model->getBooks();
        $books = BooksServices::makeBookList($books);

        return view('index/index', ['books' => $books]);
    }
}
