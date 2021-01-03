<?php

namespace Database\Seeders;

use App\Models\Hasa;
use App\Models\Hase;
use App\Models\Hasp;
use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::factory()->has(Hasa::factory()->count(2))->has(Hase::factory())->has(Hasp::factory())->create();
    }
}
