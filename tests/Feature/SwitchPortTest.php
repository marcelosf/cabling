<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SwitchPortTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIndex()
    {
        $user = \App\User::find(1);

        $response = $this->actingAs($user)->get('/switch-port');

        $response->assertStatus(200);
        $response->assertViewHas('switch_port');
    }
}
