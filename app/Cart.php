<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    protected $fillable = [
        'id','product_id', 'product_name','price', 'quantity', 'total_price',
    ];

}

