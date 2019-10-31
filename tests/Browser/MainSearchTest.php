<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Entities\Local;
use App\Entities\Patch;

class MainSearchTest extends DuskTestCase
{

    protected $patch;

    public function setUp(): void
    {
        parent::setUp();
        $this->patch = Patch::find(1);
        
    }

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

   public function testSearchForm()
   {
       $this->browse(function ($first) {
           $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->click('@search-button')
                ->waitFor('#search')
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

   public function testSearchFormFields()
   {
       $this->browse(function ($first) {
           $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->click('@search-button')
                ->waitFor('#search')
                ->type('#patch-port', '12')
                ->type('#switch', '12')
                ->type('#switch-port', '12')
                ->type('#rack', 'H')
                ->type('#build', 'T')
                ->type('#local', '222')
                ->assertVue('form.patchport', '12', '@searchform-component')
                ->assertVue('form.switch', '12', '@searchform-component')
                ->assertVue('form.switchport', '12', '@searchform-component')
                ->assertVue('form.rack', 'H', '@searchform-component')
                ->assertVue('form.build', 'T', '@searchform-component')
                ->assertVue('form.local', '222', '@searchform-component');
       });
   }

   public function testSearch()
   {
        $this->browse(function ($first) {
           $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->click('@search-button')
                ->waitfor('#search')
                ->type('#build', $this->patch->local->build)
                ->type('#local', $this->patch->local->local)
                ->type('#patch-port', $this->patch->label)
                ->type('#switch', $this->patch->switchPort->stack_name)
                ->type('#switch-port', $this->patch->switchPort->port_number)
                ->type('#rack', $this->patch->rack->local->local)
                ->click('@send-button')
                ->assertSee($this->patch->local->build);
       });
   }

   public function testDetail()
   {
       $this->browse(function ($first) {
           $first->loginAs(User::find(1))
                ->visit('/main-search')
                ->click('table > tbody > tr > td')
                ->assertSee('Detalhamento');
       });
   }
}
