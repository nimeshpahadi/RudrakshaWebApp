<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $table = 'order_items';
    protected $fillable = [
        'product_id', 'customer_id', 'quantity', 'capping_id',
         'currency_id', 'order_status',

    ];


}
