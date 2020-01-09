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


    // /** @test */
    // public function an_item_can_be_deleted()
    // {
    //     $item = factory('App\Item')->create();

    //     $this->delete('/{item}')->assertRedirect('/');

    //     $this->assertDatabseMissing('items', $item->only((int) 'id'));
    // }
    
    /** @test */
    public function a_user_can_email_the_shopping_list()
    {
        $this->withoutExceptionHandling();
        //Given I have items in the database
        $item = factory('App\Item', 5)->create();

        $this->asssertDatabaseHas('items', $item);
        //When I submit a an email request 
        $this->get('/')->

        //Then assert ashopping list is e-mailed to the "request" email address

    }
}
