<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\Phone;
use App\Entities\VoicePort;
use App\Entities\SwitchPort;

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

    public function testStore()
    {
        $data = $this->dummyPhone();

        $response = $this->actingAs($this->user)->json('POST', '/phones', $data);
        $response->assertOk();
        $response->assertJsonFragment($data);
    }

    private function dummyPhone()
    {
        $voicepanel = factory(VoicePort::class)->create();
        $switchport = factory(SwitchPort::class)->create();

        return [
            'number' => '2222',
            'category' => 'interno',
            'voicepanel_id' => $voicepanel->id,
            'switchport_id' => $switchport->id,
        ];
    }
}
