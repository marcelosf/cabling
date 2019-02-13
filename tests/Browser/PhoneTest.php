<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class PhoneTest extends DuskTestCase
{
    public function testVueIndex()
    {
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/phones')
                ->assertVue('list', Array(), '@phonetable-component');
        });
    }

    public function testEdit() 
    {
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/phones/1/edit')
                ->type('number', '1111')
                ->type('category', 'Interno')
                ->select('voicepanel', '1')
                ->select('switchport', '1')
                ->click('enviar')

                ->assertVue('message', 'Ramal criado com sucesso', '@phoneform-component');
            
        });
    }
}
