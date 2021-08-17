<?php

namespace Database\Factories;

use App\Models\Plateau;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlateauFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plateau::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'x' => 20,
            'y' => 20,
        ];
    }
}
