<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderGroup extends Model
{
    public $table = 'order_groups';
    protected $fillable = [
        'order_items_id', 'order_group','customer_id','group_status',
    ];

    protected $casts = [
        'order_items_id' => 'array'
    ];
}
