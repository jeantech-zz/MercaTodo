<?php

namespace App\ViewModels\Users;

use App\ViewModels\Concerns\HasPaginator;
use App\ViewModels\ViewModel;

class UserIndexViewModel extends ViewModel
{
    use HasPaginator;

    protected function buttons(): array
    {
        return [
            'create' => [
                'text' => trans('users.titles.create'),
                'route' => route('users.create'),
            ],
        ];
    }

    protected function title(): string
    {
        return trans('users.titles.index');
    }

    protected function filters(): array
    {
        return [
            'name' => old('filters.name') ?? request()->input('filters.name'),
        ];
    }

    protected function headers(): array
    {
       // return array_merge(trans('users.fields'), parent::headers());
       return trans('users.fields');
    }

   /*   protected function filters(): array
    {
        return [
            'multiple' => old('users.multiple') ?? request()->input('filters.multiple'),
        ];
    }*/

    protected function data(): array
    {
        return [
            'users'  => $this->collection,
        ];
    }
}
