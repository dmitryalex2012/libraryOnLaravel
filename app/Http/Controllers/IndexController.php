<?php

namespace App\Http\Controllers;

use App\app\Models\Books;
use App\app\Services\BooksServices;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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

        $filters='undefine';
        if (isset($_GET['filters'])){
            $filters = $_GET['filters'];
        }

        $filteredBooks = BooksServices::makeBookList($books);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $filters
        ]);
    }

    public function filters($array)
    {
        $books = $this->model->getBooks();

        if (isset($_GET['filters'])){
            $filters = $_GET['filters'];
        }

        $filteredBooks = BooksServices::makeBookList( $books);

//        $array = json_decode($array);

        return view('index/index', [
            'books' => $filteredBooks,
            'filters' => $array['filter']
        ]);
    }
}
