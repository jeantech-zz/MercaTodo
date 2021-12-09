<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $this->withoutExceptionHandling();
        $data = $this->registerUserData();
        $response = $this->post('/register', $data);
        
        $this->assertDatabaseHas('users',[
            'name' => 'Jennifer',
            'email' => 'jeante18@gmail.com',
            'phone_number' => '31243435',
            'address' => 'carrera 1 #1-1',
        ]);  
    }

    public function registerUserData(): array
    {
        return [
            'name' => 'Jennifer',
            'email' => 'jeante18@gmail.com',
            'password' =>'jeante18',
            'password_confirmation' => 'jeante18',
            'phone_number' => '31243435',
            'address' => 'carrera 1 #1-1',
        ];
    }
}
