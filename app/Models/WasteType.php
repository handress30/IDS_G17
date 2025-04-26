<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    protected $fillable = ['name', 'color_hex'];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
