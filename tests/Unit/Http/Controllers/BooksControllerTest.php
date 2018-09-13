<?php

namespace Tests\Unit\Http\Controllers;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function get_catalog_of_books()
    {
        $books = factory(Book::class, 2)->create();

        $response = $this->get('/books');

        foreach ($books as $book)
        {
            $this->assertDatabaseHas('books', [
                'title' => $book->title,
            ]);
        }

        $response->assertViewIs('books.index');
    }

    /** @test **/
    public function request_the_create_page()
    {
        $response = $this->get('/books/create');

        $response->assertViewIs('books.create');
    }
    
    /** @test **/
    public function the_user_does_not_send_the_title_of_the_book()
    {
        $book = new Book([
            'title' => null,
        ]);

        $this->post('/books', [
            $book,
        ]);

        $this->assertEquals('The title field is required.', session()->get('errors')->toArray()['title'][0]);
    }

    /** @test **/
    public function the_user_does_not_send_the_type_of_paper_of_the_book()
    {
        $book = new Book([
            'type_of_paper' => null,
        ]);

        $this->post('/books', [
            $book
        ]);

        $this->assertEquals('The type of paper field is required.', session()->get('errors')->toArray()['type_of_paper'][0]);
    }

    /** @test **/
    public function the_user_does_not_send_the_language_of_the_book()
    {
        $book = new Book([
            'language' => null
        ]);

        $this->post('/books', [
            $book,
        ]);

        $this->assertEquals('The language field is required.', session()->get('errors')->toArray()['language'][0]);
    }

    /** @test **/
    public function it_register_a_new_book()
    {
        $book = factory(Book::class)->create();

        $this->post('/books', [
            'title' => $book->title,
            'type_of_paper' => $book->type_of_paper,
            'language' => $book->language,
        ]);

        $this->assertDatabaseHas('books', [
            'title' => $book->title,
            'type_of_paper' => $book->type_of_paper,
            'language' => $book->language,
        ]);
    }

    /** @test **/
    public function shows_the_detail_of_the_book()
    {
        $book = factory(Book::class)->create();

        $response = $this->get("/books/{$book->id}");

        $response->assertViewIs('books.show');

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => $book->title,
            'type_of_paper' => $book->type_of_paper,
            'publisher' => $book->publisher,
            'language' => $book->language,
            'isbn_10' => $book->isbn_10,
            'isbn_13' => $book->isbn_13,
            'product_dimensions' => $book->product_dimensions,
            'weight' => $book->weight,
            'description' => $book->description,
        ]);
    }

    /** @test **/
    public function shows_the_edit_page()
    {
        $book = factory(Book::class)->create();

        $response = $this->get("/books/{$book->id}/edit");

        $response->assertViewIs('books.edit');
    }

    /** @test **/
    public function updates_the_book_registered()
    {
        $book = factory(Book::class)->create([
            'id' => 1,
        ]);

        $response = $this->put('/books/1', [
           'title' => 'book example',
           'type_of_paper' => 'paperback',
           'language' => 'en'
        ]);

        $this->assertDatabaseHas('books', [
            'title' =>'book example',
            'type_of_paper' => 'paperback',
            'language' => 'en'
        ]);

        $response->assertRedirect('/books');
    }

    /** @test **/
    public function drop_a_book_register()
    {
        $book = factory(Book::class)->create([
            'id' => 1,
        ]);

        $response = $this->delete("/books/{$book->id}");

        $this->assertDatabaseMissing('books', [
            'title' => $book->title,
        ]);

        $response->assertRedirect('/books');
    }
}
