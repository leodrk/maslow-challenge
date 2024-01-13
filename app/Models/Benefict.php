<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefict extends Model
{
    use HasFactory;

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function variations() {
        return $this->hasMany(Variation::class);
    }
}
