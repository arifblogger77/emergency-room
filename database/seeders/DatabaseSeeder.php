<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        $this->call([
            // AddressSeeder::class,
            AdmSeeder::class,
            BedaSeeder::class,
            BedSeeder::class,
            CasedocSeeder::class,
            DoctorSeeder::class,
            DonsSeeder::class,
            // EmailSeeder::class,
            // HasaSeeder::class,
            // HaseSeeder::class,
            // HaspSeeder::class,
            MedaSeeder::class,
            MedicationSeeder::class,
            MedSeeder::class,
            NonsSeeder::class,
            NurseSeeder::class,
            PatientSeeder::class,
            PersonSeeder::class,
            // PhonenoSeeder::class,
            ReceptionistSeeder::class,
            RonsSeeder::class,
            ShiftSeeder::class,
            SupbySeeder::class,
            TriagebySeeder::class,
            WorkerSeeder::class,
        ]);
    }
}
