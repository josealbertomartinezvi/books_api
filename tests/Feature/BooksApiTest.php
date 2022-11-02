<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Book;

class BooksApiTest extends TestCase
{

    use RefreshDatabase;

    /** @test  */
    function can_get_all_books(): void
    {
        $books = Book::factory(4)->create();

        $this->getJson(route('books.index'))
            ->assertJsonFragment([
            'title' => $books[0]->title
        ]);
    }

    /** @test  */
    function can_get_one_book(): void
    {
        $book = Book::factory()->create();

        $this->getJson(route('books.show', $book))
            ->assertJsonFragment([
            'title' => $book->title
        ]);
    }

    /** @test  */
    function can_create_book(): void
    {
        $book = [
            'title' => 'My new book'
        ];

        $this->postJson(route('books.store'), [])
            ->assertJsonValidationErrorFor('title');

        $this->postJson(route('books.store'),$book)->assertJsonFragment($book);
        $this->assertDatabaseHas('books', $book);
    }

    /** @test  */
    function can_update_book(): void
    {
        $book = Book::factory()->create();
        $bookUpdated = [
            'title' => 'My new book updated'
        ];

        $this->patchJson(route('books.update',$book), $bookUpdated)
            ->assertJsonFragment($bookUpdated);

        $this->assertDatabaseHas('books', $bookUpdated);
    }

    /** @test  */
    function can_delete_book(): void
    {
        $book = Book::factory()->create();

        $this->deleteJson(route('books.destroy',$book))
            ->assertNoContent();

        $this->assertDatabaseCount('books', 0);
    }

}
