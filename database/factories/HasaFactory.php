<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Hasa;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class HasaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hasa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Person::factory(),
            'address_id' => Address::factory(),
        ];
    }
}
