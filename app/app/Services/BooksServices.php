<?php

namespace App\app\Services;

use App\app\Models\Books;

class BooksServices
{
    public $filteringServices;

    public function __construct()
    {
        $this->filteringServices = new BooksFilteringServices();
    }

    /**
     * Makes books list using filters and pagination.
     *
     * @param $filters
     * @param $pageNumber
     * @return array|mixed
     */
    public function makeBookList($filters, $pageNumber)
    {
        if (isset($filters['findText'])) {

            /** Find book by author or title. */
            $book = Books::findBooks($filters['findText']);

            return (["books" => $book,
                "booksPagesQuantity" => 1]);
        }

        $books = Books::getBooks();
        if (isset($filters)) {

            /** When "filters" changed */
            SessionServices::filtersToSession($filters);
            $filters ['pageNumber'] = 1;

        } elseif (isset($pageNumber)) {

            /** When page number changed */
            SessionServices::pageNumberToSession($pageNumber);

            $filters = SessionServices::filtersFromSession();

        } else {

            /** Get $filters from SESSION for "index" page */
            $filters = SessionServices::loadInitialData();

        }

        $books = $this->filteringServices->sorting($books, $filters['sorting']);

        $books = $this->filteringServices->filtering($books, $filters['filtering']);

        $booksPagesQuantity = ceil(count($books) / 10);
        $books = array_slice($books, ($filters ['pageNumber'] - 1) * 10, 10);

        return ["books" => $books,
                "booksPagesQuantity" => $booksPagesQuantity
        ];
    }
}
