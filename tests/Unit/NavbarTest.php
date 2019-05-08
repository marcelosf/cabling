<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NavbarTest extends TestCase
{

    protected $user, $response;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->response = $this->actingAs($this->user)->get('/home');
    }

    public function testTitle()
    {
        $this->response->assertSee('InfraIag');
    }

    public function testTitleIsLink()
    {
        $this->response->assertSee('InfraIag</a');
    }
}
