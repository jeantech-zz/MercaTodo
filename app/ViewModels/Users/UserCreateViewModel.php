<?php

namespace App\ViewModels\Users;

use App\Inputs\Input;
use App\Inputs\TextInput;
use App\Inputs\PasswordInput;
use App\Models\User;
use App\ViewModels\ViewModel;

class UserCreateViewModel extends ViewModel
{
    protected function buttons(): array
    {
        return [
            'back' => [
                'text' => trans('common.back'),
                'route' => route('users.index'),
            ],
            'save' => [
                'text' => trans('common.save'),
                'route' => route('users.index'),
            ],
        ];
    }

    protected function title(): string
    {
        return trans('users.titles.create');
    }

    /**
     * @return Input[]
     */
    protected function inputs(): array
    {
        return [
            new TextInput(
                trans('users.labels.name'),
                trans('users.inputs.name'),
                trans('users.placeholders.name'),
                true
            ),
            new TextInput(
                trans('users.labels.email'),
                trans('users.inputs.email'),
                trans('users.placeholders.email'),
                true
            ),
            new TextInput(
                trans('users.labels.phone_number'),
                trans('users.inputs.phone_number'),
                trans('users.placeholders.phone_number'),
                true
            ),
            new TextInput(
                trans('users.labels.address'),
                trans('users.inputs.address'),
                trans('users.placeholders.address'),
                true
            ),  
            new PasswordInput(
                trans('users.labels.password'),
                trans('users.inputs.password'),
                trans('users.placeholders.password'),
                true
            ),  
            new PasswordInput(
                trans('users.labels.password_confirmation'),
                trans('users.inputs.password_confirmation'),
                trans('users.placeholders.password_confirmation'),
                true
            ),            
        ];
    }

    protected function data(): array
    {
        return [
            'model' => new User(),
            'action' => route('users.store'),
        ];
    }
}
