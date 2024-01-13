<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'value'
    ];

    public function variation() {
        return $this->belongsTo(Variation::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function giftCard() {
        return $this->belongsTo(GiftCard::class);
    }
}
