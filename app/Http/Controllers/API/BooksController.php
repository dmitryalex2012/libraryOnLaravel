<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @OA\Get(
     *     path="/books",
     *     operationId="examplesAll",
     *     tags={"Books"},
     *     summary="Display a listing of the books",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     )
     * )
     *
     * @return void
     */
    public function index()
    {
        dd("Hello");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
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
