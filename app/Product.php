<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Sales;
use App\Cart;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','product_name', 'price', 'sales_price','quantity','profit',
    ];

    public function sales(){
        
        return $this->hasMany(Sales::class);
    }

}
