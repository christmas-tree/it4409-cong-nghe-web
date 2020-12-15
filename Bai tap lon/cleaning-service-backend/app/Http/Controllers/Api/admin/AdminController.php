<?php

namespace App\Http\Controllers\Api\admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profitPerMonth()
    {
        $profitArray = [];

        for ($i = 5; $i >=0 ; $i--) {
            $time = Carbon::now()->subMonths($i);

            $profitArray[$time->format('m/Y')] = Booking::where('status', BookingStatus::Done)
                ->whereMonth('from', $time->format('m'))
                ->whereYear('from', $time->format('Y'))
                ->sum('amount');
        }

        return response()->json($profitArray);
    }

    public function rating()
    {
        $rating = [];

        for ($i = 1; $i <= 5; $i++) {
            $rating[$i] = Review::where('rating', $i)->count();
        }

        return response()->json($rating);
    }
}
