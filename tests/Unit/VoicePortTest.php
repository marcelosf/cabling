<?php

namespace Tests\Unit;

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

    public function testIndex()
    {
        $response = $this->actingAs($this->user)->json('GET', '/voice-port');
        
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);   
    }

    public function testUpdate()
    {
        $uri = '/voice-port/' . $this->voiceport->id;

        $response = $this->actingAs($this->user)->json('PUT', $uri, $this->getVoice());
        $response->assertOk();
        $response->assertJson(['message' => 'Atualização realizada com sucesso']);
    }

    public function testEdit()
    {
        $uri = '/voice-port/' . $this->voiceport->id . '/edit';

        $response = $this->actingAs($this->user)->get($uri);
        $response->assertOk();
    }

    public function testShow()
    {
        $uri = '/voice-port/' . $this->voiceport->id;

        $response = $this->actingAs($this->user)->json('GET', $uri);
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);
    }

    protected function getVoice()
    {
        return [
            'voiceport_number' => 1,
            'central' => 1,
            'distribution' => 1,
            'rack_id' => 1
        ];
    }
    
}
