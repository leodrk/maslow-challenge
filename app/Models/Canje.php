<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canje extends Model
{
    use HasFactory;

    public function variacion() {
        return $this->belongsTo(Variacion::class);
    }

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }

    public function giftCard() {
        return $this->belongsTo(GiftCard::class);
    }
}
