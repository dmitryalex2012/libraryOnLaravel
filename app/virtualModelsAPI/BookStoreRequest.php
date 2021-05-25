<?php

namespace App\virtualModelsAPI;

use URL;

/**
 * @OA\Schema(
 *     description="The request for book creation",
 *     type="object",
 *     title="Example storring request",
 * )
 */
class BookStoreRequest
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Book ID",
     *     format="int32",
     *     example="1",
     * )
     *
     * @var string
     */
    public $id;

    /**
     * @OA\Property(
     *     title="Book",
     *     description="Book title",
     *     format="string",
     *     example="Star wars",
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="Author",
     *     description="Book author",
     *     format="string",
     *     example="Pushkin",
     * )
     *
     * @var string
     */
    public $author;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Book description",
     *     format="string",
     *     example="Short book description",
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Book cover",
     *     description="Book cover image",
     *     format="string",
     *     example="Some image",
     * )
     *
     * @var URL
     */
    public $book_cover;

    /**
     * @OA\Property(
     *     title="Category",
     *     description="Book category",
     *     format="string",
     *     example="history",
     * )
     *
     * @var string
     */
    public $category;

    /**
     * @OA\Property(
     *     title="Language",
     *     description="Book language",
     *     format="string",
     *     example="English",
     * )
     *
     * @var string
     */
    public $language;

    /**
     * @OA\Property(
     *     title="Publishing year",
     *     description="The year of book publishing ",
     *     format="int32",
     *     example="1987",
     * )
     *
     * @var string
     */
    public $publishing_year;

    /**
     * @OA\Property(
     *     title="Book created at",
     *     description="Book created at",
     *     format="date-time",
     *     example="2021-02-02 14:15:03",
     * )
     *
     * @var string
     */
    public $created_at;

    /**
     * @OA\Property(
     *     title="Book updated at",
     *     description="Book updated at",
     *     format="date-time",
     *     example="2021-02-02 14:15:03",
     * )
     *
     * @var string
     */
    public $updated_at;
}
