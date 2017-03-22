<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    public $table = 'customer_addresses';
    protected $fillable = [
        'customer_id', 'country','state',
        'street', 'contact','latitude_long',

    ];


    protected $casts = [
        'latitude_long' => 'array'
    ];
}
