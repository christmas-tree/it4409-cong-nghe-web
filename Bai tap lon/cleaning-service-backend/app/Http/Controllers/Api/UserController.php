<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Booking as BookingResource;
use App\Models\User;
use App\Models\Booking;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getBookings()
    {
        return BookingResource::collection(Booking::with(['services', 'review'])->where('user_id', Auth::id())->get());
    }

    public function lock(User $user)
    {
        $user->update(['status' => UserStatus::LOCKED]);

        return response()->json(['success' => 'locked user']);
    }

    public function unlock(User $user)
    {
        $user->update(['status' => UserStatus::ACTIVE]);

        return response()->json(['success' => 'unlocked user']);
    }

    public function updateProfile()
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['min:1', 'max:75', 'string'],
            'address' => ['string', 'max:255'],
            'phone_number' => ['numeric', 'unique:users,phone_number,' . Auth::id()],
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()]);
        } else {
            Auth::user()->update(request()->only(['name', 'address', 'phone_number']));

            return new UserResource(Auth::user());
        }
    }
}
