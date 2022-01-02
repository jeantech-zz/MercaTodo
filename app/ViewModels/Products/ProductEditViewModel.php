<?php

namespace App\ViewModels\Products;

use App\Inputs\Input;
use App\Inputs\TextInput;
use App\Inputs\NumberInput;
use App\Inputs\HiddenInput;
use App\Models\Product;
use App\ViewModels\Concerns\HasModel;

class ProductEditViewModel extends ProductCreateViewModel
{
    use HasModel;

    protected function title(): string
    {
        return trans('users.titles.edit');
    }

    /**
     * @return Input[]
     */
    protected function inputs(): array
    {
        return [
            new HiddenInput(
                trans('users.labels.id'),
                trans('users.inputs.id'), 
                trans('users.message_error.id'),          
                true               
            ),
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
            'model' => $this->model,
            'action' => route('products.update', $this->model->id),
        ];
    }
}
