<?php

namespace App\Http\Controllers;

use App\app\Services\BookServices;
use Illuminate\Http\Request;

/**
 * Class Book
 * @withPath Eloquent
 */
class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = BookServices::getBooks($request);

        return view('index/book', [
            'books' => $books,
            'request' => $request
        ]);
    }
}
