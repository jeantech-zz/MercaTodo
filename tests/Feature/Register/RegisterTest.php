<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /**
     * @dataProvider userProvider
     */
    public function test_new_users_can_register(string $name, string  $email,string  $password, string  $password_confirmation): void
    {

        $response = $this->post('/register', compact('name','email','password', 'password_confirmation'));
        
        $this->assertDatabaseHas('users',[
            'name' => 'Jennifer',
            'email' => 'jeante18@gmail.com'
        ]);  
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function test_it_validate_request_data_register(string $name,string  $email,string  $password, string  $password_confirmation, string $field): void
    {
        $response = $this->post('/register', compact('name','email','password', 'password_confirmation'));

        $response->assertInvalid([$field]);
    }

     /**
     * @dataProvider userProvider
     */
    public function test_email_is_unique(string $name,string  $email,string  $password, string  $password_confirmation, string $phone_number, string  $address): void
    {
        $user= User::factory()->create(compact('name','email','password', 'phone_number', 'address'));
        $this->test_it_validate_request_data_register($name, $email, $password, $password_confirmation, 'email');
    }


    public function invalidDataProvider(): array
    {
        $data = $this->userProvider()['user'];
        
        return [
            'name required' => array_merge($data, ['name' => '', 'field' => 'name']),
            'name max' => array_merge($data, ['name' => Str::random(256), 'field' => 'name']),
            'email required' => array_merge($data, ['email' => '', 'field' => 'email']),            
            'email max' => array_merge($data, ['email' => Str::random(255), 'field' => 'email']),            
            'password required' => array_merge($data, ['password' => '', 'field' => 'password']),            
            'password min' => array_merge($data, ['password' => 'jen', 'field' => 'password']), 
        ];
    }

    public function userProvider(): array
    {
        return [
            "user" => [
            'name' => 'Jennifer',
            'email' => 'jeante18@gmail.com',
            'password' =>'jeante18',
            'password_confirmation' => 'jeante18',
            'phone_number' => '31243435',
            'address' => 'carrera 1 #1-1',
            ]
        ];
    }
}
