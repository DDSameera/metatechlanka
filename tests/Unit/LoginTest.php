<?php

namespace Tests\Unit;

use Faker\Factory;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class LoginTest extends TestCase
{
    use  WithFaker;

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

    public function test_validate_user_profile()
    {

        Session::start();
        $response = $this->call('GET', '/users/4/edit', [
            'email' => 'digix.sameera@yahoo.com',
            'name' => 'Sameera',
            'address' => '',
            'contact_no' => '',
            'profile_image'=>'',
            '_token' => csrf_token()
        ]);
        $response->assertStatus(302);

    }
}
