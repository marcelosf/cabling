<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;



class SwitchPortTest extends TestCase
{
    
    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function index_return_json_switch_list()
    {
        $response = $this->actingAs($this->user)->json('GET', '/switch-port');
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);
    }

}
