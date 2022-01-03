<?php

namespace App\Actions\Product;

use App\Models\Product;

class CreateActions
{
    public static function execute(array $data, string $url): Product
    {
        return Product::create([
            'name' =>  $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $url,
        ]);
    }
}

