<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class RegisterTest extends DuskTestCase
{
    /**
     * Test go to register page and see elements.
     *
     * @return void
     */
    public function testGoToRegisterPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    // Tìm element bằng thuộc tính name
                    ->assertPresent('input[name="name"]')
                    ->assertPresent('input[name="email"]')
                    // Tìm element bằng thuộc tính id
                    ->assertPresent('#password')
                    ->assertPresent('#password-confirm')
                    // Tìm element bằng thuộc tính class
                    ->assertPresent('.btn-primary');

        });
    }

    /**
     * Test register feature works corectly.
     *
     * @return void
     */
    public function testRegisterFeature()
    {
        $this->browse(function (Browser $browser) {
            $password = 'Aa@12345';
            $faker = Faker::create();
            $name = $faker->name;
            $browser->visit('/register')
                    ->type('name', $name)
                    ->type('email', $faker->email)
                    ->type('password', $password)
                    ->type('password_confirmation', $password)
                    ->click('.btn-primary');

            $browser->assertSeeLink($name)
                    ->assertPathIs('/home');
        });
    }
}
