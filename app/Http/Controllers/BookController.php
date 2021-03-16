<?php

namespace App\Http\Controllers;

use App\Book;
use App\Filters\BookFilters;

class BookController extends Controller
{
    public function index(BookFilters $filters)
    {
        return Book::filter($filters)->get();
    }
}
