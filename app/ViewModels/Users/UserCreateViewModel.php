<?php

namespace App\ViewModels\Users;

use App\Inputs\AutocompleteInput;
use App\Inputs\Input;
use App\Inputs\NumberInput;
use App\Inputs\TextInput;
use App\Inputs\URLInput;
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
