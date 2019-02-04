<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

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

}   
