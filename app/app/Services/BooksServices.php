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
        $books = Books::getBooks();

        if (isset($filters['findText'])) {

            /** Find book by author or title. */
             $book = $this->filteringServices->findBook($books, $filters['findText']);

            return (["books" => array($book),
                "booksPagesQuantity" => 1]);
        }

        if (isset($filters)) {
            /** When "filters" changed */
            SessionServices::filtersToSession($filters);
            $filters ['pageNumber'] = 1;
        } elseif (isset($pageNumber)) {
                SessionServices::pageNumberToSession($pageNumber);

                $filters = SessionServices::filtersFromSession();   // when page number changed
        } else {
                $filters = SessionServices::loadInitialData();      // get $filters from SESSION for "index" page
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
