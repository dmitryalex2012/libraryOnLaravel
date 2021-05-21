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
     *     summary="Create yet another book record",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BookStoreRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/BookShowRequest")
     *     ),
     * )
     * Store a newly created resource in storage.
     *
     * @param AddBookRequest $request
     * @return void
     */
    public function store(AddBookRequest $request)
    {
        $book = new Book();
        $book->fill($request->all());
        $book->save();

        return response()->json($book);
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
