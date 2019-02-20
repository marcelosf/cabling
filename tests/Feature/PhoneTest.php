<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\Phone;

class PhoneTest extends TestCase
{
    protected $user;

    protected $phone;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->phone = factory(Phone::class)->create();
    }

    public function testIndex()
    {
        $response = $this->actingAs($this->user)->get('/phones');
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->actingAs($this->user)->get('/phones/create');
        $response->assertOk();
    }

    public function testEdit()
    {
        $uri = '/phones/' . $this->phone->id . '/edit';

        $response = $this->actingAs($this->user)->get($uri);
        $response->assertOk();
    }

    public function testShow()
    {
        $uri = '/phones/' . $this->phone->id;

        $response = $this->actingAs($this->user)->get($uri);
        $response->assertSee('Detalhes do Ramal');
    }
}
