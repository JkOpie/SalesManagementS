<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoice;

class Sales extends Model
{
    protected $fillable = [
        'id',
        'Product_id',
        'Price',
        'Quantity',
        'Invoice_id',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
