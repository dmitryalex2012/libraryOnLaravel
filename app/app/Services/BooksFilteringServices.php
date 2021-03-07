<?php
namespace App\app\Services;


class BooksFilteringServices
{
    public function findBook($books, $searchParameter)
    {
        $finedBooks = [];
        foreach ($books as $book){
            if (($book['author'] === $searchParameter) || ($book['title'] === $searchParameter)){
                $finedBooks = $book;
            }
        }

        return $finedBooks;
    }

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

        switch ($filteringParameter){
            case "before1980":
                $books = $this->publishedBefore($books);
                break;
            case "after1980":
                $books = $this->publishedAfter($books);
                break;
        }

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

    public function publishedBefore($books)
    {
        $filteredBooks = array_filter($books, function($k) {
            return $k['publishingYear'] <= 1979;
        });
        return $filteredBooks;
    }

    public function publishedAfter($books)
    {
        $filteredBooks = array_filter($books, function($k) {
            return $k['publishingYear'] > 1979;
        });
        return $filteredBooks;
    }
}
