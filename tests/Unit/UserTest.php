<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_successfull_login() {
        App\User::create([
            'username' => "miku",
            'email' => "korg@miku.com",
            'password' => bcrypt('japan'),
        ]);
    
        $this->assertFalse(Auth::check());
    
        $this->visit( route('login') )
        ->submitForm('Login', [
            'email' => "korg@miku.com",
            'password' => "japan"
        ])
        ->see('Welcome')
        ->seePageIs( route('app') );
    
        $this->assertTrue(Auth::check());
    }
}
