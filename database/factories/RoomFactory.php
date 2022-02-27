<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{

    protected $model = Room::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'topic' => $this->faker->words(3, true),
            'size'  => $this->faker->numberBetween(1,10),
            'owner_id' => $this->faker->numberBetween(1,10),
            'language_id'=> 1,
        ];
    }
}
