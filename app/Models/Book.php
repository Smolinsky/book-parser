<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'title',
        'description',
        'published_date',
        'isbn'
    ];

    protected $casts = [
        'published_date' => 'date:Y-m-d',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
}
