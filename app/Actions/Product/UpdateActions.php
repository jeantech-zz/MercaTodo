<?php

namespace App\Actions\Product;

use App\Models\Product;

class UpdateActions
{
    public static function execute(array $data): Product
    {
      
        $record = Product::find($data['id']);
        
        $record->update([ 
            'name' =>  $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
        ]);

        return $record;
    }
}