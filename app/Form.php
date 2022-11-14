<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'inputs';

    protected $fillable = [
        'user_name', 'user_surname'
    ];
}
