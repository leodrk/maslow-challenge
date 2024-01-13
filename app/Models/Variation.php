<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function benefict() {
        return $this->belongsTo(Benefict::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
