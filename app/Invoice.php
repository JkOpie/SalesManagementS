<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;

class Invoice extends Model
{
    protected $fillable = [
        'id', 
        'ReceiptNum', 
        'CustName',
        'CustAdd', 
        'TProduct', 
        'TQuantity',
        'TPrice',
        'Payment',
        'Balance',
        'Time',
    ];

    public function sales(){   
        return $this->hasMany(Sales::class);
    }

    public function products(){   
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
    
}
