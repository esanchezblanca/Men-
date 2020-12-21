<?php

namespace Database\Factories;

use App\Models\Plate;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'diners' => $this->faker->numberBetween($min = 1, $max = 5),
            'type' => $this->faker->name,
        ];
    }
}
