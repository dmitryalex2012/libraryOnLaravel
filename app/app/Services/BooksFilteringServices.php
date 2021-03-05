<?php
namespace App\app\Services;


class BooksFilteringServices
{
    public function sorting($books, $sortingParameter)
    {
        switch ($sortingParameter){
            case "newBooksFirst":
                $books = $this->newBooksFirst($books);
                break;
            case "oldBooksFirst":
                $books = $this->oldBooksFirst($books);
                break;
        }

        return $books;
    }

    public function filtering($books, $filteringParameter)
    {

        //

        return $books;
    }

    public function newBooksFirst($books)
    {
        usort($books, function($a, $b) {

            return $b['publishingYear'] <=> $a['publishingYear'];

        });

        return $books;
    }

    public function oldBooksFirst($books)
    {
        usort($books, function($a, $b) {

            return $a['publishingYear'] <=> $b['publishingYear'];

        });

        return $books;
    }
}
