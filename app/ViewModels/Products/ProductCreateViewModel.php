<?php

namespace App\ViewModels\Products;

use App\Inputs\Input;
use App\Inputs\NumberInput;
use App\Inputs\TextInput;
use App\Inputs\PasswordInput;
use App\Models\Product;
use App\ViewModels\ViewModel;

class ProductCreateViewModel extends ViewModel
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
                trans('products.labels.name'),
                trans('products.inputs.name'),
                trans('products.placeholders.name'),  
                trans('products.message_error.name'),          
                true               
            ),
            new TextInput(
                trans('products.labels.description'),
                trans('products.inputs.description'),
                trans('products.placeholders.description'),
                trans('products.message_error.description'),
                true
            ),
            new NumberInput(
                trans('products.labels.price'),
                trans('products.inputs.price'),
                trans('products.placeholders.price'),
                trans('products.message_error.price'),
                true
            ),
            new TextInput(
                trans('products.labels.image'),
                trans('products.inputs.image'),
                trans('products.placeholders.image'),
                trans('products.message_error.image'),
                false
            ),           
        ];
    }

    protected function data(): array
    {
        return [
            'model' => new Product(),
            'action' => route('products.store'),
        ];
    }
}
