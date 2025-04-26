<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'domain',
        'description',
        'aux1',
        'aux2',
        'date_hour',
        'id_father',
    ];

    protected $dates = ['deleted_at'];
}
