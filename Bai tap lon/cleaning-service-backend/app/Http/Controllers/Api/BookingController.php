<?php

namespace App\Http\Controllers\Api;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Resources\Booking as BookingResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $bookings = Booking::find(Auth::id());

        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return BookingResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => ['required'],
            'to' => ['required'],
            'address' => ['required', 'max:256', 'string'],
            'phone_number' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:75'],
            'service_ids' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $amount = 0;
        foreach ($request->service_ids as $serviceId) {
            $amount += Service::findOrFail($serviceId)->cost;
        }

        $booking = Booking::create([
            'user_id' => Auth::guard('api')->id() ?? null,
            'from' => $request->from,
            'to' => $request->to,
            'amount' => $amount,
            'status' => BookingStatus::New,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'name' => $request->name,
        ]);

        foreach ($request->service_ids as $serviceId) {
            $booking->services()->attach($serviceId);
        }

        $booking->load('services');

        return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return BookingResource
     */
    public function show(Booking $booking)
    {
        $booking->load('services');

        return new BookingResource($booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return BookingResource
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());

        return new BookingResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json(null, 204);
    }

    public function cancel(Booking $booking)
    {
        if ($booking->status === BookingStatus::New) {
            $booking->update(['status' => BookingStatus::Canceled]);

            return new BookingResource($booking);
        } else {
            return response()->json(['status:' . $booking->status]);
        }
    }
}
