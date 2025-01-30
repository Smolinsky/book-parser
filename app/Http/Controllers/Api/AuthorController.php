<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorController extends Controller
{
    public function __construct(private readonly AuthorService $authorService)
    {
    }

    public function showAuthors(Request $request): AnonymousResourceCollection
    {
        $authors = $this->authorService->getAuthors($request->all());

        return AuthorResource::collection($authors);
    }
}
