<?php

namespace Database\Factories;

use App\Models\Email;
use App\Models\hase;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class HaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Person::factory(),
            'eaddress' => Email::factory(),
        ];
    }
}
