<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookRequest  $request
     * @return JsonResponse
     */
    public function store(BookRequest $request): JsonResponse
    {
        $book = new Book();

        $book->title = $request->input("title");
        $book->save();

        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  Book  $book
     * @return JsonResponse
     */
    public function show(Book $book): JsonResponse
    {
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BookRequest  $request
     * @param  Book  $book
     * @return JsonResponse
     */
    public function update(BookRequest $request, Book $book): JsonResponse
    {
        $book->title = $request->input("title");
        $book->save();

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $book
     * @return Response
     */
    public function destroy(Book $book): Response
    {
        $book->delete();

        return response()->noContent();
    }
}
