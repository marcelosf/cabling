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
                ->assertVue('list', 'Array', '@phonetable-component');
        });
    }
}
