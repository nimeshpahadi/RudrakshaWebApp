<?php

namespace App\Rudraksha\Entities\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
