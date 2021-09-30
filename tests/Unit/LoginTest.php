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

    public function test_validate_user_login()
    {

        $view = $this->withViewErrors([
            'email' =>  ['The email field is required'],
            'password' => ['The password field is required'],
        ])->view('auth.login');

        $view->assertSee('The email field is required');
    }


}
