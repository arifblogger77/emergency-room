<?php

namespace Database\Seeders;

use App\Models\Phoneno;
use Illuminate\Database\Seeder;

class PhonenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phoneno::factory()->count(5)->create();
    }
}
