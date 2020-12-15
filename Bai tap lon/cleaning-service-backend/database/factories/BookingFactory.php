<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $from = $this->faker->dateTimeBetween('-5 years', 'now');
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'from' => $from,
            'to' => Carbon::parse($from)->addHours( $this->faker->numberBetween(1, 5) ),
            'amount' => $this->faker->numberBetween(50, 500) * 1000,
            'status' => $this->faker->numberBetween(1, 4),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'name'=> $this->faker->name,
        ];
    }
}
