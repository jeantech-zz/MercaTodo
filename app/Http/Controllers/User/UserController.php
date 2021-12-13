<?php

namespace App\Http\Controllers\User;

use App\Actions\User\CreateActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositories;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
//use Illuminate\Http\Request;


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

    public function store(UserRequest $request)
    {
        $user = CreateActions::execute($request->validated());
        event(new Registered($user));

      return redirect()->route('user.index')->with('success', 'User created successfully.');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
        $user = $this->userRepositories->userId($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
