<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Requests\AddBookRequest;
use App\Services\BookServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @OA\Get(
     *     path="/books",
     *     operationId="examplesAll",
     *     tags={"Books"},
     *     summary="Outputs the books list",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function index()
    {
        $books = BookServices::getBooksAPI();

        return response()->json($books);
    }

    /**
     * @OA\Post(
     *     path="/books",
     *     operationId="bookCreate",
     *     tags={"Books"},
     *     summary="Create new book in library",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/BookShowRequest")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BookStoreRequest")
     *     ),
     * )
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */

//* @param AddBookRequest $request
//@param \App\Http\Requests\AddBookRequest $request
    public function store(Request $request)
//    public function store(AddBookRequest $request)
    {
//        $book = new Book();
//        $book->fill($request->all());
//        $book->save();

        //        $book = [
//            "id" => "5",
//            "title" => "sw",
//            "author" => "A",
//            "description" => "fdvbfds",
//            "book_cover" => "C:\Program Files (x86)\OpenServer\OSPanel\domains\myFramework\web\photo\photo3.jpg",
//            'category' => 'history',
//            "language" => "ngrfs",
//            "publishing_year" => "1981",
//            "created_at" => "2021-02-09 01:43:37",
//            "updated_at" => "2021-02-09 01:43:37"
//        ];
//        $save = new BookServices();
//        $save->saveBookDB($book);
//        return response('', 201);

//        return response()->json($book);
        return response($request, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
