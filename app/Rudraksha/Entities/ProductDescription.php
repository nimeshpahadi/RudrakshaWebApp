<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    public $table = 'product_descriptions';
    protected $fillable = [
         'description','information',
    ];
    protected $hidden = [
        'product_id'
    ];

}
