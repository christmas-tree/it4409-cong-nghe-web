<?php

namespace Database\Seeders;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(30)->create();
//        Booking::factory(500)->create();
//
//        Booking::all()->each(function ($booking) {
//            $booking->services()->attach(Service::find(array_rand([1, 2, 3], 2)));
//        });
//
//        $bookings = Booking::where('status', BookingStatus::Done)->get();
//        foreach ($bookings as $booking) {
//            Review::create([
//                'booking_id' => $booking->id,
//                'rating' => random_int(1, 5),
//                'content' => 'ok, im fine',
//            ]);
//        }
    }
}
