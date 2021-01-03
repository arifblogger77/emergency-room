<?php

namespace Database\Factories;

use App\Models\Hasp;
use App\Models\Person;
use App\Models\Phoneno;
use Illuminate\Database\Eloquent\Factories\Factory;

class HaspFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hasp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Person::factory(),
            'phoneno_id' => Phoneno::factory(),
        ];
    }
}
