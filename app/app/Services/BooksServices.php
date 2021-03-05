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
     * Makes books list using filters.
     *
     * @param $filters
     * @param $pageNumber
     * @return array|mixed
     */
    public function makeBookList($filters, $pageNumber)
    {
        $books = Books::getBooks();

        if (isset($filters)){

            SessionServices::filtersToSession($filters);        // when "filters" changed

        } elseif (isset($pageNumber)){

            SessionServices::pageNumberToSession($pageNumber);

            $filters = SessionServices::filtersFromSession();   // when page number changed

        } else{

            $filters = SessionServices::loadInitialData();      // for "index" page load

        }

        /** Find book by author or title. */
        if (isset($filters['findText'])){

            //

            return $books;
        }

        $books = $this->filteringServices->sorting($books, $filters['sorting']);

        $books = $this->filteringServices->filtering($books, $filters['filtering']);

        return $books;
    }

}
