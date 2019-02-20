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

    // public function testCreate() 
    // {
    //     $this->browse(function ($first) {

    //         $first->loginAs(User::find(1))
    //             ->visit('/phones/create')
    //             ->type('number', '1111')
    //             ->type('category', 'Interno')
    //             ->type('rack_id', '1')
    //             ->type('voicepanel_id', '1')
    //             ->type('switchport_id', '1')
    //             ->press('@send')
    //             ->waitForText('Ramal criado com sucesso')
                
    //             ->assertVue('toast.html', 'Ramal criado com sucesso', '@phoneform-component');
    //     });
    // }

    // public function testEdit() 
    // {
    //     $p = factory(Phone::class)->create();
    //     $uri = '/phones/' . $p->id . '/edit';
    //     $phone = $this->dummyPhone();

    //     $this->browse(function ($first) use($phone, $uri) {
    //         $first->loginAs(User::find(1))
    //             ->visit($uri)
    //             ->type('number', $phone['number'])
    //             ->type('category', $phone['category'])
    //             ->select('voicepanel_id', $phone['voicepanel_id'])
    //             ->type('switchport_id', $phone['switchport_id'])
    //             ->press('@send')
    //             ->waitForText('Ramal atualizado com sucesso')

    //             ->assertSee('Ramal atualizado com sucesso');
    //     });
    // }

    public function testDelete()
    {

        $phone = factory(Phone::class)->create($this->dummyPhone());
        $uri = '/phones/' . $phone->id;

        $this->browse(function ($first) use($uri, $phone) {
            $first->loginAs(User::find(1))
                ->visit($uri)
                ->press('@delete')
                ->assertDontSee($phone->number);
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
