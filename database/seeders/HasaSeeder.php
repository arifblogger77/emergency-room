<?php

namespace Database\Seeders;

use App\Models\Hasa;
use Illuminate\Database\Seeder;

class HasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hasa::factory()->count(5)->create();
    }
}
