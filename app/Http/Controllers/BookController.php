<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
//        dd($request->all());
        $bookQuery = Book::query();

        if ($request->filled('sorting')) {
            switch ($request['sorting']) {
                case 'newBooksFirst':
                    $bookQuery->orderBy('publishing_year', 'DESC');
                    break;
                case 'oldBooksFirst':
                    $bookQuery->orderBy('publishing_year', 'ASC');
                    break;
            }
        }

        $filteredBooks = $bookQuery->paginate(5);

        return view('index/book', [
            'books' => $filteredBooks,
            'filters' => null
        ]);
    }
}
