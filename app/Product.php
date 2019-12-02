<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use DataTables;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','product_name', 'price', 'sales_price','quantity',
    ];
}
