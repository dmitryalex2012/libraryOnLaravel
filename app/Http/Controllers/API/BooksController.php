<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AddAPIBookRequest;
use App\Http\Requests\EditAPIBookRequest;
use App\Services\BookServices;
use Illuminate\Http\JsonResponse;

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
     * Update the book data in storage.
     *
     * @OA\Put(
     *      path="/books/{id}",
     *      operationId="updateBook",
     *      tags={"Books"},
     *      summary="Update selected book",
     *      description="Returns updated book data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Book ID for editing",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateBookRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UpdateBookRequest")
     *       ),
     * )
     *
     * @param EditAPIBookRequest $request
     * @param int $id
     * @return void
     */
    public function update(EditAPIBookRequest $request, $id)
    {
        $this->bookServices->bookDelete($id);
        $this->bookServices->saveBookDB($request);

        return response("Request=$request, id=$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *      path="/books/{id}",
     *      operationId="deleteBook",
     *      tags={"Books"},
     *      summary="Delete selected book",
     *      description="Deletes a selected book",
     *      @OA\Parameter(
     *          name="id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     * )
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->bookServices->bookDelete($id);

        return response("Book with id=$id deleted successfully.", 201);
    }
}
