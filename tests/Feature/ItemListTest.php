<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemListTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function a_user_can_create_an_item()
    {
        $this->withoutExceptionHandling();

        $attributes = factory('App\Item')->raw();

        $this->post('/', $attributes)->assertRedirect('/');

        $this->assertDatabaseHas('items', $attributes);

        $this->get('/')->assertSee($attributes['description']);
    }

    /** @test */
    public function an_item_requires_a_description()
    {
        $attributes = factory('App\Item')->raw(['description' => '']);

        $this->post('/', $attributes)->assertSessionHasErrors();
    }
}
