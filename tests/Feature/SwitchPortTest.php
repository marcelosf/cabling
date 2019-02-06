<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\SwitchPort;

class SwitchPortTest extends TestCase
{
    
    
   protected $user;

   protected function setUp()
   {
       parent::setUp();
       $this->user = factory(User::class)->create();
   }

    /** @test */
    public function user_can_access_switch_port_list()
    {
        $response = $this->actingAs($this->user)->get('/switch-port');
        $response->assertOk();
    }

    /** @test */
    public function user_can_update_switch_port()
    {
        $s = factory(SwitchPort::class)->create();
        $uri = '/switch-port/' . $s->id . '/edit';

        $response = $this->actingAs($this->user)->get($uri);
        $response->assertOk();
    }

    public function user_can_access_switch_port_creation()
    {
        $response = $this->actingAs($this->user)->get('/switch-port/create');
        $response->assertOk();
    }

}   
