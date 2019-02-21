<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class MainSearchTest extends TestCase
{
    protected $user;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Testing index controller function
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->actingAs($this->user)->get('/main-search');
        $response->assertOk();
    }
}
