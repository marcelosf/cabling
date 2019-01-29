<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = \App\User::find(1);

        $response = $this->actingAs($user)->get('/patches');

        $response->assertStatus(200);
        $response->assertViewHas('patches');
    }

    public function testShow()
    {
        $user = \App\User::find(1);

        $response = $this-actingAs($user)->get('/patches/1');
        $response->assertStatus(200);
        $response->assertViewHas('patches');
    }

}
