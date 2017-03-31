<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $table = 'product_images';
    protected $fillable = [
         'image','product_id','rank'
    ];

    protected $hidden = [
       'product_id'
    ];
}
