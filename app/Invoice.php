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
        'Time',
    ];

    public function sales(){
        return $this->hasMany(Sales::class);
    }
}
