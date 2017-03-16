<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $table = 'product_images';
    protected $fillable = [
         'name','product_id'
    ];
    protected $casts = [
        'name' => 'array'
    ];
    protected $hidden = [
       'product_id'
    ];
}
