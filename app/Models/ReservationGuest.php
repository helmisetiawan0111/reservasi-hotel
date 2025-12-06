<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationGuest extends Model
{
    protected $fillable = [
        'reservation_id',
        'name',
        'email',
        'phone',
        'id_type',
        'id_number',
    ];

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
