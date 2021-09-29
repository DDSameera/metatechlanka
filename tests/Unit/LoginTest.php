<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_user_login()
    {
        Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
            '_token' => csrf_token()
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_invalid_user_login()
    {
        Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'admin@admin.com',
            'password' => 'invalidpassword',
            '_token' => csrf_token()
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

}
