<?php

namespace Tests\Unit\Http\Controllers;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function get_the_listing_authors()
    {
        $authors = factory(Author::class, 2)->create();
        
        $response = $this->get('/authors');
        
        foreach ($authors as $author)
        {
            $this->assertDatabaseHas('authors', [
                'name' => $author->name,
            ]);
        }

        $response->assertViewIs('authors.index');
    }

    /** @test **/
    public function show_the_form_for_creating_new_authors()
    {
        $response = $this->get('/authors/create');

        $response->assertViewIs('authors.create');
    }

    /** @test **/
    public function store_a_new_author()
    {
        $author = factory(Author::class)->create();

        $response = $this->post('/authors', [
           'name' => $author->name,
           'middle_name' => $author->middle_name,
           'last_name' => $author->last_name,
           'mothers_last_name' => $author->mothers_last_name,
        ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('authors', [
            'name' => $author->name,
            'middle_name' => $author->middle_name,
            'last_name' => $author->last_name,
            'mothers_last_name' => $author->mothers_last_name,
        ]);
    }

    /** @test **/
    public function shows_the_detail_of_the_author()
    {
        $author = factory(Author::class)->create();

        $response = $this->get("/authors/{$author->id}");

        $response->assertViewIs('authors.show');

        $this->assertDatabaseHas('authors', [
            'id' => $author->id,
            'name' => $author->name,
            'middle_name' => $author->middle_name,
            'last_name' => $author->last_name,
            'mothers_last_name' => $author->mothers_last_name,
        ]);
    }

    /** @test **/
    public function shows_the_edit_page_for_author()
    {
        $author = factory(Author::class)->create();

        $response = $this->get("/authors/{$author->id}/edit");

        $response->assertViewIs('authors.edit');
    }

    /** @test **/
    public function updates_the_author_registered()
    {
        $author = factory(Author::class)->create([
            'id' => 1,
        ]);

        $response = $this->put("/authors/{$author->id}", [
           'name' => 'John',
           'last_name' => 'Example',
        ]);

        $this->assertDatabaseHas('authors', [
            'name' =>'John',
            'last_name' => 'Example',
        ]);

        $response->assertRedirect('/authors');
    }

    /** @test **/
    public function drop_a_author_register()
    {
        $author = factory(Author::class)->create([
            'id' => 1,
        ]);

        $response = $this->delete("/authors/{$author->id}");

        $this->assertDatabaseMissing('authors', [
            'name' => $author->name,
        ]);

        $response->assertRedirect('/authors');
    }

    /** @test **/
    public function the_user_does_not_send_the_name_of_the_author()
    {
        $response = $this->post('/authors', [
            'name' => null,
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test **/
    public function the_user_does_not_send_the_last_name_of_the_author()
    {
        $author = new Author([
            'last_name' => null,
        ]);

        $this->post('/authors', [
            $author,
        ]);

        $this->assertEquals('The last name field is required.', session()->get('errors')->toArray()['last_name'][0]);
    }
}
