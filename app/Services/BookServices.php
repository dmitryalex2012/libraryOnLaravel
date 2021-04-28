<?php

namespace App\Services;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $bookTitle = Book::query()->where('id', '=', $id)->get()->toArray();

        return $bookTitle;
    }

    /**
     * Performs user validation after user data changing by superadministrator.
     *
     * @param Request $request
     * @param $oldID
     * @return array
     */
    public function validBook(Request $request, $oldID)
    {
        $validator = $request->validate([
            'id' => [
                'numeric',
                'required',
                Rule::unique('App\Book')->ignore($oldID)
            ],
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'userCover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'language' => 'required|string',
            'publishing_year' => 'required|numeric',
            'created_at' => 'required|date'
        ]);

        return $validator;
    }

    /**
     * Saves book to DB.
     *
     * @param $book
     */
    public function saveBookDB($book)
    {
        DB::table('books')->insert([
            'id' => $book['id'],
            'title' => $book['title'],
            'author' => $book['author'],
            'description' => $book['description'],
            'book_cover' => $book['book_cover'],
            'category' => $book['category'],
            'language' => $book['language'],
            'publishing_year' => $book['publishing_year'],
            'created_at' => $book['created_at']
        ]);

        return;
    }

    /**
     * Deletes book from DB by ID
     *
     * @param $id
     */
    public function bookDelete($id)
    {
        DB::table('books')->where('id', '=', $id)->delete();

        return;
    }

    /**
     * Changes book cover. Takes old book cover in case absence loaded book cover.
     * Saves book to DB.
     *
     * @param $book
     * @param $oldID
     * @return mixed
     */
    public function changeBookCover($book, $oldID)
    {
        if (!isset($book['book_cover'])) {
            $oldBook = $this->getBook($oldID);
            $book['book_cover'] = $oldBook['0']['book_cover'];
        }

        $this->bookDelete($oldID);
        $this->saveBookDB($book);

        return $book;
    }
}
