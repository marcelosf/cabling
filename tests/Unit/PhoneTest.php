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

    protected $phone;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->phone = $this->dummyPhone();
    }

    public function testIndex()
    {
        $response = $this->actingAs($this->user)->json('GET', '/phones');
        $response->assertOk();
        $response->assertJson(['data' => ['data' => []]]);
    }

    public function testStore()
    {
        $data = $this->phone;

        $response = $this->actingAs($this->user)->json('POST', '/phones', $data);
        $response->assertOk();
        $response->assertJsonFragment($data);
    }

    public function testUpdate()
    {
        $data = $this->phone;
        
        $response = $this->actingAs($this->user)->json('PUT', '/phones/1', $data);
        $response->assertOk();
        $response->assertJsonFragment($data);
    }

    public function testShow()
    {
        $phone = factory(Phone::class)->create($this->phone);
        $uri = '/phones/' . $phone->id;

        $response = $this->actingAs($this->user)->json('GET', $uri);
        $response->assertOk();
        $response->assertJsonFragment($this->phone);
    }

    public function testDestroy()
    {
        $phone = factory(Phone::class)->create();
        $uri = '/phones/' . $phone->id;

        $response = $this->actingAs($this->user)->delete($uri);
        $response->assertStatus(302);
        $p = Phone::find($phone->id);
        $this->assertEquals(null, $p);
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
