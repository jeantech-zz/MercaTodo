<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DisableActions
{
    public static function execute(int $id): User
    {
       
        $record = User::find($id);
dd( $record);
        /*if
            $record->update([ 
                'name' =>  $data['name'],
                'email' => $data['email'] ,
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phone_number'] ,
                'address' => $data['address']
            ]);*/

        return $record;
    }
}