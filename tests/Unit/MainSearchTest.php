<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\Local;
use App\Entities\Patch;

class MainSearchTest extends TestCase
{
    protected $user;
    protected $local;
    protected $patch;

    /**
     * @inheritDoc
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->local = factory(Local::class)->create();
        $this->patch = factory(Patch::class)->create();
    }

    /**
     * Testing index controller
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->actingAs($this->user)->get('/main-search');
        $response->assertOk();
    }

    public function testShow()
    {
        $uri = '/main-search/' . $this->local->id;
        $response = $this->actingAs($this->user)->json('GET', $uri);
        $response->assertOk();
    }

    public function testSearch()
    {
        $uri = '/patches?search=id:' . $this->patch->id;
        $response = $this->actingAs($this->user)->json('GET', $uri);
        $response->assertOk();
        $response->assertJsonFragment(['id' => $this->patch->id ]);
    }
}
