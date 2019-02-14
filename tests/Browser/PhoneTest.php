<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Entities\Phone;
use App\Entities\SwitchPort;
use App\Entities\VoicePort;

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

    public function testCreate() 
    {
        $this->browse(function ($first) {

            $first->loginAs(User::find(1))
                ->visit('/phones/create')
                ->type('number', '1111')
                ->type('category', 'Interno')
                ->type('voicepanel_id', '20')
                ->type('switchport_id', '1')
                ->press('@send')
                ->waitForText('Ramal criado com sucesso')
                
                ->assertVue('toast.html', 'Ramal criado com sucesso', '@phoneform-component');
        });
    }

    public function testEdit() 
    {
        $phone = $this->dummyPhone();

        $this->browse(function ($first) use($phone) {
            $first->loginAs(User::find(1))
                ->visit('/phones/1/edit')
                ->type('number', $phone['number'])
                ->type('category', $phone['category'])
                ->select('voicepanel_id', $phone['voicepanel_id'])
                ->select('switchport_id', $phone['switchport_id'])
                ->click('@send')

                ->assertVue('toast.html', 'Ramal atualizado com sucesso', '@phoneform-component');
            
        });
    }

    protected function dummyPhone()
    {
        $phone = factory(Phone::class)->make();
        $voicepanel = factory(VoicePort::class)->create();
        $switchport = factory(SwitchPort::class)->create();

        $phone->voicepanel_id = $voicepanel->id;
        $phone->switchport_id = $switchport->id;

        return $phone->toArray();
    }

}
