<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'cbnumber',
        'sport_id',
        'sport_name',
        'equipment_id',
        'equipment_name',
        'location_id',
        'location_branch',
        'date',
        'time_slot'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function equipment()
{
    return $this->belongsTo(Equipment::class, 'equipment_id');
}

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
