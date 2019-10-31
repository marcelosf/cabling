<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\Patch;


class SearchDetailTest extends TestCase
{
    protected $response;
    protected $patch;

    protected function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $patch = factory(Patch::class)->create();
        $url = 'main-search/'.$patch->id;
        $this->response = $this->actingAs($user)->get($url);
        $this->patch = $patch;
    }

    public function testUrl()
    {
        $this->response->assertOk();
    }

    public function testLocalHtml()
    {
        $contents = ['Local', 'Bloco', 'Andar'];
        foreach ($contents as $expected) {
            $this->response->assertSee($expected);
        }
    }

    public function testLocalData()
    {
        $contents = [
            $this->patch->local->build,
            $this->patch->local->floor,
            $this->patch->local->local,
        ];

        foreach ($contents as $expected) {
            $this->response->assertSee($expected);
        }
    }

    public function testSwitchData()
    {
        $s = $this->patch->switchPort;
        $contents = [
            $s->port_number,
            $s->poe,
            $s->poe_status,
            $s->vlan,
            $s->switch_name,
            $s->switch_code,
            $s->stack_name,
            $s->stack_ip,
        ];

        foreach ($contents as $expected) {
            $this->response->assertSee($expected);
        }
    }

    public function testRackData()
    {
        $r = $this->patch->rack;
        $contents = [
            $r->name,
            $r->size,
        ];

        foreach ($contents as $expected) {
            $this->response->assertSee($expected);
        }
    }
}
