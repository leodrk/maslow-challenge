<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variacion extends Model
{
    use HasFactory;

    public function beneficio() {
        return $this->belongsTo(Beneficio::class);
    }

    public function canjes() {
        return $this->hasMany(Canje::class);
    }
}
