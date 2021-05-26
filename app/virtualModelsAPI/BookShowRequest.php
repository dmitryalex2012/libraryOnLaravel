<?php

namespace App\virtualModelsAPI;

use DateTime;
use URL;

/**
 * @OA\Schema(
 *     description="The request for book creation",
 *     type="object",
 *     title="Example storring request",
 * )
 */
class BookShowRequest
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Book ID",
     *     format="int64",
     *     example="2",
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     title="Title",
     *     description="Book title",
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
     * @var integer
     */
    public $publishing_year;

    /**
     * @OA\Property(
     *     title="Book created at",
     *     description="Book created at",
     *     example="2021-02-02 14:15:03",
     *     format="date-time",
     *     type="string",
     * )
     *
     * @var DateTime
     */
    public $created_at;
}
