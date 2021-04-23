<?php

namespace App\Services;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookServices
{
    /**
     * Makes books list using filters and pagination.
     *
     * @param $request Request
     * @return mixed
     */
    public function getBooks($request)
    {
        $bookQuery = Book::query();

        if ($request->filled('findText')) {
            $bookQuery->where('author', $request['findText'])->orWhere('title', $request['findText']);

        } else {
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
            if ($request->filled('filtering')) {
                switch ($request['filtering']) {
                    case 'before1980':
                        $bookQuery->where('publishing_year', '<=', 1979);
                        break;
                    case 'after1980':
                        $bookQuery->where('publishing_year', '>', 1980);
                        break;
                }
            }
        }

        $filteredBooks = $bookQuery->paginate(5)->withPath("?" . $request->getQueryString());

        return $filteredBooks;
    }

    public function getBook($id)
    {
//        $bookTitle = DB::table('books')->where('id', '=', $id)->first();
        $bookTitle = Book::query()->where('id', '=', $id)->get()->toArray();

        return $bookTitle;
    }

    public function bookDelete($id)
    {
        DB::table('books')->where('id', '=', $id)->delete();

        return;
    }
}
