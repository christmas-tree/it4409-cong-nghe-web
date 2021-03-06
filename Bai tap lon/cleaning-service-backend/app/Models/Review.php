<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'rating',
        'booking_id',
    ];

    public function Booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
