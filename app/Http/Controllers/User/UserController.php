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
use App\ViewModels\Users\UserCreateViewModel;
use App\ViewModels\Users\UserEditViewModel;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(IndexRequest $request, UserIndexViewModel $viewModel): View
    {
        $users = User::filter($request->input('filters', []))->paginate();
        $viewModel->collection($users);

        return view('users.index', $viewModel->toArray());
    }

    public function create(UserCreateViewModel $viewModel): View
    {
        return view('layouts.create', $viewModel);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        dd('entro');
        $user = CreateActions::execute($request->validated());
        event(new Registered($user));

      return redirect()->route('user.index')->with('success', 'User created successfully.');
        
    }

    public function edit(User $user): View
    {
        $viewModel = new UserEditViewModel($user);

        return view('layouts.edit', $viewModel);
    }

    public function update(UpdateRequest $request): RedirectResponse
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
