<?php


namespace App\app\Services;

use App\app\Models\Books;

class BooksServices
{
    /**
     * Makes books list using filters.
     *
     * @param $filters
     * @return array|mixed
     */
    public function makeBookList($filters, $pageNumber)
    {
        $books = Books::getBooks();

        if (isset($filters)){
            SessionServices::filtersToSession($filters);        // when "filters" changed
        } else{
            $filters = SessionServices::filtersFromSession();   // when page number changed
        }

        /** Find book by author or title. */
        if (isset($filters['findText'])){

            //

            return $books;
        }

        $books = BooksFilteringServices::sorting($books, $filters['sorting']);

        $books = BooksFilteringServices::filtering($books, $filters['filtering']);

        return $books;
    }

}
