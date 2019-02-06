<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class VoicePortTest extends TestCase
{

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function testVoicePortIndex()
    {
        $response = $this->actingAs($this->user)->json('GET', '/voice-port');
        
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);   
    }
    
}
