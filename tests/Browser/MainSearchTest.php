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
                ->assertSee('Local')
                ->assertSee('Ponto')
                ->assertSee('Hostname')
                ->assertSee('IP')
                ->assertSee('Switch')
                ->assertSee('Porta Switch')
                ->assertSee('Sala Rack');
        });
    }

   public function testSearchFormFields()
   {
       $this->browse(function ($first) {
           $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->click('@search-button')
                ->assertSee('Bloco')
                ->assertSee('Sala')
                ->assertSee('Ponto')
                ->assertSee('Hostname')
                ->assertSee('IP')
                ->assertSee('Switch')
                ->assertSee('Porta Switch')
                ->assertSee('Sala Rack');
       });
   }
}
