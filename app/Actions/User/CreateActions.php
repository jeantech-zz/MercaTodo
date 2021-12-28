<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class CreateActions
{
    public static function execute(array $data): User
    {
        return User::create([
            'name' =>  $data['name'],
            'email' => $data['Email'] ,
            'password' => Hash::make($data['Password']),
            'phone_number' => $data['Phone'] ,
            'address' => $data['Address'] ,
            'confirmation_code' =>  Str::random(15)
        ]);
    }
}

