<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    public function __construct(private readonly BookService $bookService)
    {
    }

    public function showBooks(Request $request): AnonymousResourceCollection
    {
        $books = $this->bookService->getBooks($request->all());

        return BookResource::collection($books);
    }

    public function getBooksByAuthor(int $authorId): BookResource
    {
        $books = $this->bookService->getBooksByAuthor($authorId);

        return new BookResource($books);
    }
}
