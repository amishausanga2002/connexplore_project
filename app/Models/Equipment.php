<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    // Ensure the fillable property includes all fields that need mass assignment
    protected $fillable = ['name', 'description', 'sport_id', 'location_id', 'quantity', 'image', 'availability_status'];


    // Define a relationship to the Sport model
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    // Define a relationship to the Location model
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function bookings()
{
    return $this->hasMany(Booking::class, 'equipment_id');
}

}
