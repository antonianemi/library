<?php

namespace Test\Unit\AuthorTest;

use App\Book;
use App\Author;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AuthorTest extends TestCase
{
    /** @test **/
    public function author_wrote_one_or_many_books()
    {
        $author = factory(Author::class)->create();

        $book = factory(Book::class)->create();

        $author->books()->attach($book->id);

        $this->assertInstanceOf(BelongsToMany::class, $author->books());
    }
}
