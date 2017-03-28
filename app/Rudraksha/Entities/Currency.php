<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $table = 'currencies';
    protected $fillable = [
        'currency',
        'code',
        'representation',
    ];
}
