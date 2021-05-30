<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AddAPIBookRequest;
use App\Services\BookServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public $bookServices;

    public function __construct()
    {
        $this->bookServices = new BookServices();
    }

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
     * @param AddAPIBookRequest $request
     * @return void
     */

    public function store(AddAPIBookRequest $request)
    {
        $this->bookServices->saveBookDB($request);

        return response()->json($request);
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
