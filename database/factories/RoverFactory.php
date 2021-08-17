<?php

namespace Database\Factories;

use App\Models\Rover;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rover::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $compass = ['W', 'N', 'E', 'S'];

        return [
            'x' => 10,
            'y' => 10,
            'face' => 'N',
        ];
    }
}
