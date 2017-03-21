<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class Category_benifit extends Model
{
    public $table = 'category_benifits';
    protected $fillable = [
        'category_id', 'benefit_heading','benefit',

    ];

    protected $casts = [
        'benifit' => 'array'
    ];
}
