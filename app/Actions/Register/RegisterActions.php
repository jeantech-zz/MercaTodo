<?php

namespace App\Actions\Register;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterActions
{
    public static function execute(array $data): User
    {
        return User::create([
            'name' =>  $data['name'],
            'email' => $data['email'] ,
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'] ,
            'address' => $data['address'] ,
            'confirmation_code' =>  Str::random(15)
        ]);
    }
}