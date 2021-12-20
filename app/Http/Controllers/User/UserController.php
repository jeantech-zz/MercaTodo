<?php

namespace App\Http\Controllers\User;

use App\Actions\User\CreateActions;
use App\Actions\User\UpdateActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\ViewModels\Users\UserIndexViewModel;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;


class UserController extends Controller
{
    public function __construct(UserRepositories $userRepositories){
        $this->userRepositories = $userRepositories;
    }
/**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(IndexRequest $request, UserIndexViewModel $viewModel): View
    {
        $users = User::filter($request->input('filters', []))->paginate();
        $viewModel->collection($users);

        return view('users.index', $viewModel->toArray());
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

    public function edit($user)
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
