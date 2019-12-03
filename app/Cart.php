<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'id','product_id', 'price', 'quantity', 'total_price',
    ];
}

