<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class HomeTest extends TestCase
{
    
    protected $user, $response;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->response = $this->actingAs($this->user)->get('/home');
    }

    /**
     * Status must be 200.
     *
     * @return void
     */
    public function testUrl()
    {
        $this->response->assertStatus(200);
    }

    /**
     * Must render home View.
     *
     * @return void
     */
    public function testRenderedView()
    {
        $this->response->assertViewIs('home');
    }

    /**
     * View must have Locais text.
     *
     * @return void
     */
    public function testViewHasCards()
    {
        $this->response->assertSee('Locais');
        $this->response->assertSee('Racks');
        $this->response->assertSee('Lista');
        $this->response->assertSee('Patch Panels');
        $this->response->assertSee('Switches');
        $this->response->assertSee('Ramais');
        $this->response->assertSee('Voice Panel');

    }

}
