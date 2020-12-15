<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cost',
    ];

    public function Bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_detail', 'service_id', 'booking_id');
    }
}
