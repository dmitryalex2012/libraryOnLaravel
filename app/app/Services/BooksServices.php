<?php


namespace App\app\Services;

use App\app\Models\Books;

class BooksServices
{
    protected $model;

    public function __construct()
    {
        $this->model = new Books();
    }

    public function makeBookList($filters)
    {
//        if ($filters->isMethod('get')){
//            $filters = $filters['text'];
//        }

        $books = $this->model->getBooks();

        return $books;
    }

}
