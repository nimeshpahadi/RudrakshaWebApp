<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{

    public $table = 'delivery_addresses';
    protected $fillable = [
        'customer_id', 'country','state',
        'city', 'latitude_long','address_note',
        'address_line1', 'address_line2','zip_code',
    ];

    protected $casts = [
        'latitude_long' => 'array'
    ];
}
