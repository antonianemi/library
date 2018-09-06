<?php

namespace Test\Unit\BookTest;

use App\Book;
use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BookTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function book_was_written_by_one_or_many_authors()
    {
        $book = factory(Book::class)->create();

        $author = factory(Author::class)->create();

        $book->authors()->attach($author->id);

        $this->assertInstanceOf(BelongsToMany::class, $book->authors());
    }
}
