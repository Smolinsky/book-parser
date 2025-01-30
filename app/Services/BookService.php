<?php

namespace App\Services;

use App\Models\Book;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    use Filterable;

    public function getBooks(array $filters = []): Collection
    {
        $query = Book::with('authors');

        $this->applyFilters($query, $filters);

        return $query->get();
    }

    public function getBooksByAuthor(int $authorId): Collection
    {
        return Book::whereHas('authors', function ($query) use ($authorId) {
            $query->where('authors.id', $authorId);
        })->with('authors')->get();
    }
}
