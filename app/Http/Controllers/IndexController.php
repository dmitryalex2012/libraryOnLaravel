<?php

namespace App\Http\Controllers;

use App\app\Models\Books;

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

        return view('index/index', ['books' => $books]);
    }
}
