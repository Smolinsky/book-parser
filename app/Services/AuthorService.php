<?php

namespace App\Services;

use App\Models\Author;
use App\Traits\Filterable;

class AuthorService
{
    use Filterable;

    public function getAuthors(array $filters = [])
    {
        $query = Author::withCount('books');

        $this->applyFilters($query, $filters, 'author');

        return $query->get();
    }
}
