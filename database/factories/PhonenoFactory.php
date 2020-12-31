<?php

namespace Database\Factories;

use App\Models\phoneno;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhonenoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phoneno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'areacode' => '+62',
            'number' => $this->faker->randomNumber(5),
        ];
    }
}
