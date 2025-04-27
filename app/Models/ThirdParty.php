<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdParty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'identification',
        'email',
        'phone',
        'address',
        'id_domain_type',
    ];

    public function domainType()
    {
        return $this->belongsTo(Domain::class, 'id_domain_type');
    }
}
