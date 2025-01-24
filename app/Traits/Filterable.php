<?php

namespace App\Traits;

trait Filterable
{
    public function applyFilters($query, array $filters, string $modelType = 'book'): void
    {
        if (!empty($filters['search'])) {
            if ($modelType === 'book') {
                $query->where('title', 'like', "%{$filters['search']}%")
                    ->orWhere('description', 'like', "%{$filters['search']}%");

                $query->orWhereHas('authors', function ($query) use ($filters) {
                    $query->where('authors.name', 'like', "%{$filters['search']}%");}
                );
            } elseif ($modelType === 'author') {
                $query->where('name', 'like', "%{$filters['search']}%");
            }
        }
    }
}
