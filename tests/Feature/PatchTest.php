<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatchTest extends TestCase
{

    /**
     * Testing index.
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

    /**
     * Testing show view
     *
     * @return void
     */
    public function testShow()
    {
        $user = \App\User::find(1);

        $response = $this->actingAs($user)->get('/patches/1');
        $response->assertStatus(200);
        $response->assertViewHas('patch');
    }

    /**
     * Testing Edit view
     *
     * @return void
     */
    public function testEdit()
    {
        $user = \App\User::find(1);
        
        $response = $this->actingAs($user)->get('/patches/1/edit');
        $response->assertStatus(200);
        $response->assertViewHas('patch');
    }

}
