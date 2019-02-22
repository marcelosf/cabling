<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Entities\Local;

class MainSearchTest extends DuskTestCase
{

    public function testIndex()
    {
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->assertSee('LOCAL')
                ->assertSee('RACK')
                ->assertSee('PATCH PANEL')
                ->assertSee('SWITCH')
                ->assertSee('VOICE PANEL')
                ->assertSee('TELEFONE');
        });
    }

    public function testLocalTabItem()
    {
        $local = factory(Local::class)->create();
        $local_name = $local->build . '-' . $local->local;

        $this->browse(function ($first) use($local_name) {
            $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->click('#local')
                ->assertSee($local_name);
        });
    }
}
