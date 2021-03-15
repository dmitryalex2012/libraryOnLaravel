<?php

namespace App\app\Services;

use App\app\Models\Books;


class BooksFilteringServices
{

    /**
     * Gets books list from Books model using sorting and filtering parameters.
     *
     * @param $sortingParameter
     * @param $filteringParameter
     * @return array
     */
    public function getBooks($sortingParameter, $filteringParameter)
    {
        $filteringColumn = 'publishing_year';
        $sign = '>';
        $value = 0;
        $orderByColumn = 'id';
        $direction = 'ASC';

        if (!empty($sortingParameter)) {
            $orderByColumn = 'publishing_year';
            switch ($sortingParameter) {
                case 'newBooksFirst':
                    $direction = 'DESC';
                    break;
                case 'oldBooksFirst':
                    $direction = 'ASC';
                    break;
                case 'none':
                    $orderByColumn = 'id';
                    $direction = 'ASC';
            }
        }

        if (!empty($filteringParameter)) {
            switch ($filteringParameter) {
                case "before1980":
                    $sign = '<=';
                    $value = 1979;
                    break;
                case "after1980":
                    $sign = '>';
                    $value = 1980;
                    break;
            }
        }

        $books = Books::makeBooksList($filteringColumn, $sign, $value, $orderByColumn, $direction);

        return $books;
    }
}
