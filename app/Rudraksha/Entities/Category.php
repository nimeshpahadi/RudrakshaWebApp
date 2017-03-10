<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    protected $fillable = [
        'name', 'code','information','face_no', 'short_description','status',
    ];

}
