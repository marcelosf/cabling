<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\VoicePort;

class VoicePortTest extends TestCase
{
    
    protected $user;

    protected $voiceport;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->voiceport = factory(VoicePort::class)->create();
    }
    
    public function testCreateView()
    {
        $response = $this->actingAs($this->user)->get('/voice-port/create');
        $response->assertOk();
    }

    public function testShowView()
    {
        $uri = '/voice-port/' . $this->voiceport->id;

        $response = $this->actingAs($this->user)->get($uri);
        $response->assertOk();
    }
}
