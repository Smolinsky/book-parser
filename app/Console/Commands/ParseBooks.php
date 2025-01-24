<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Console\Command;

class ParseBooks extends Command
{
    protected $signature = 'parse:books';

    protected $description = 'Parse books from JSON and insert in database';

    public function handle()
    {
        $data = $this->fetchBooks();

        foreach ($data as $item) {
            $publishedDate = isset($item['publishedDate']['$date'])
                ? date('Y-m-d', strtotime($item['publishedDate']['$date']))
                : null;

            $book = Book::updateOrCreate(
                ['title' => $item['title']],
                [
                    'description' => $item['longDescription'] ?? null,
                    'published_date' => $publishedDate ?? null,
                ]
            );

            foreach ($item['authors'] as $authorName) {
                $author = Author::firstOrCreate([
                    'name' => $authorName
                ]);
                $book->authors()->syncWithoutDetaching($author->id);
            }
        }

        $this->info('Books parsed successfully!');
    }

    private function fetchBooks(): array
    {
        $json = file_get_contents('https://raw.githubusercontent.com/bvaughn/infinite-list-reflow-examples/refs/heads/master/books.json');
        return json_decode($json, true) ?? [];
    }
}
