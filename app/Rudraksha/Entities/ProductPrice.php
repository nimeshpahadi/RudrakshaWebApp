<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    public $table = 'product_prices';
    protected $fillable = [
        'product_id',
        'price',
        'currency_id',
    ];
}
