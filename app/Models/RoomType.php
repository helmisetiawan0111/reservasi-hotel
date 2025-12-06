<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RoomType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'base_price',
        'capacity',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'base_price' => 'decimal:2',
        ];
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'room_facility');
    }

    public function seasonPrices(): HasMany
    {
        return $this->hasMany(SeasonPrice::class);
    }

    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Room::class, 'room_type_id', 'room_id', 'id', 'id');
    }

}
