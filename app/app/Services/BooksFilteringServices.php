<?php

namespace App\app\Services;

use App\app\Models\Books;

class BooksFilteringServices
{
    /**
     * Gets books from DB by author name or book title.
     *
     * @param $books
     * @param $searchParameter
     * @return array|mixed
     */
    public function findBook($books, $searchParameter)
    {
//        $finedBooks[0] = null;
//        foreach ($books as $book) {
//            if (($book['author'] === $searchParameter) || ($book['title'] === $searchParameter)) {
//                $finedBooks = $book;
//            }
//        }
        $finedBooks = Books::query()->where('author', $searchParameter)->orWhere('title', $searchParameter)
            ->get()->toArray();

//        if (empty($finedBooks)) {
//            $finedBooks[0] = null;
//        }

        return $finedBooks[0];
}

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
                $books = $this->newBooksFirst($books);
                break;
            case "oldBooksFirst":
                $books = $this->oldBooksFirst($books);
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
                $books = $this->publishedBefore($books);
                break;
            case "after1980":
                $books = $this->publishedAfter($books);
                break;
        }

        return $books;
    }

    /**
     * Performs sorting in this order: new books first.
     *
     * @param $books
     * @return mixed
     */
    public function newBooksFirst($books)
    {
        usort($books, function ($a, $b) {

            return $b['publishing_year'] <=> $a['publishing_year'];
        });

        return $books;
    }

    /**
     * Performs sorting in this order: old books first.
     *
     * @param $books
     * @return mixed
     */
    public function oldBooksFirst($books)
    {
        usort($books, function ($a, $b) {

            return $a['publishing_year'] <=> $b['publishing_year'];
        });

        return $books;
    }

    /**
     * Gets from the list of books only books published before 1979.
     *
     * @param $books
     * @return array
     */
    public function publishedBefore($books)
    {
        $filteredBooks = array_filter($books, function ($k) {
            return $k['publishing_year'] <= 1979;
        });
        return $filteredBooks;
    }

    /**
     *  Gets from the list of books only books published after 1980.
     *
     * @param $books
     * @return array
     */
    public function publishedAfter($books)
    {
        $filteredBooks = array_filter($books, function ($k) {
            return $k['publishing_year'] > 1979;
        });
        return $filteredBooks;
    }
}
