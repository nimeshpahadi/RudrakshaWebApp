<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    public $table = 'product_infos';
    protected $fillable = [
        'category_id', 'name', 'code','price','status', 'rank','tag','discount','quantity_available',
    ];
    protected $casts = [
        'tag' => 'array'
    ];
}
