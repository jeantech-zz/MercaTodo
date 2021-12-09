<?php

namespace App\Http\Controllers\Register;

use App\Actions\Register\RegisterActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function store(RegisterRequest $request)
    {
        $user = RegisterActions::execute($request->validated());
        event(new Registered($user));
        
        return $user;
    }

}
