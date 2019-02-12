<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class PhoneTest extends TestCase
{
    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function testIndex()
    {
        $response = $this->actingAs($this->user)->json('GET', '/phones');
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);
    }
}
