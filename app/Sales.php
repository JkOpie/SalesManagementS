<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoice;
use App\Product;
class Sales extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'product_name',
        'Price',
        'Quantity',
        'invoice_id',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

   
}
