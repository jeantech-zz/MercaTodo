<?php

namespace App\ViewModels\Users;

use App\Models\User;

class UserEditViewModel extends UserCreateViewModel
{
    public function __construct(public ?User $user = null)
    {
    }

    protected function title(): string
    {
        return trans('users.titles.edit');
    }

    protected function data(): array
    {
        return [
            'model' => $this->user,
            'action' => route('users.update', $this->user),
        ];
    }
}
