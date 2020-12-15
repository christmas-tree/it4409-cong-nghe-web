<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from',
        'to',
        'amount',
        'status',
        'address',
        'phone_number',
        'name',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Review()
    {
        return $this->hasOne(Review::class, 'booking_id');
    }

    public function Services()
    {
        return $this->belongsToMany(Service::class, 'booking_detail', 'booking_id', 'service_id');
    }
}
