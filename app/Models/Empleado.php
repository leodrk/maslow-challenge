<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function canjes() {
        return $this->hasMany(Canje::class);
    }
}
