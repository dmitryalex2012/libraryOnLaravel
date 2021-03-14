<?php

namespace App\app\Services;

use App\app\Models\Books;


class BooksFilteringServices
{
    /**
     * Sorts the list of books: new or old books first.
     *
     * @param $books
     * @param $sortingParameter
     * @return mixed
     */
    public function sorting($books, $sortingParameter)
    {
        switch ($sortingParameter) {
            case "newBooksFirst":
                $books = Books::sortingBooks('publishing_year', 'DESC');
                break;
            case "oldBooksFirst":
                $books = Books::sortingBooks('publishing_year', 'ASC');
                break;
        }

        return $books;
    }

    /**
     * Filters the list of books: displays books published before or after 1960 year.
     *
     * @param $books
     * @param $filteringParameter
     * @return array
     */
    public function filtering($books, $filteringParameter)
    {
        switch ($filteringParameter) {
            case "before1980":
                $books = Books::filteringBooks('publishing_year', '<=', 1979);
                break;
            case "after1980":
                $books = Books::filteringBooks('publishing_year', '>', 1979);
                break;
        }

        return $books;
    }
}
