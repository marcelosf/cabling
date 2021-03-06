<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class NavbarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testInfraIagLink()
    {
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/racks')
                ->click('@title')
                ->assertPathIs('/home');
        });
    }
}
