<?php

namespace App\Http\Controllers\User;

use App\Actions\User\CreateActions;
use App\Actions\User\UpdateActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Repositories\User\UserRepositories;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;


class UserController extends Controller
{
    public function __construct(UserRepositories $userRepositories){
        $this->userRepositories = $userRepositories;
    }

    public function index():view
    {
        $users = $this->userRepositories->userPaginate();

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
   
    }

    public function create():view
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store(CreateRequest $request)
    {
        $user = CreateActions::execute($request->validated());
        event(new Registered($user));

      return redirect()->route('user.index')->with('success', 'User created successfully.');
        
    }

    public function edit($id)
    {
       
        $user = $this->userRepositories->userId($id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        $user = UpdateActions::execute($request->validated());
        return redirect()->route('user.index')->with('success', 'User Update successfully.');
    }

    public function disableEnable($id)
    {
        $user = DisableActions::execute($id);

        return redirect()->route('user.index')->with('success', 'User Update successfully.');
    }


}
