<?php

namespace App\Services;

use App\Models\Author;
use App\Traits\Filterable;
use Illuminate\Support\Collection;

class AuthorService
{
    use Filterable;

    public function getAuthors(array $filters = []): Collection
    {
        $query = Author::withCount('books');

        $this->applyFilters($query, $filters, 'author');

        return $query->get();
    }
}
