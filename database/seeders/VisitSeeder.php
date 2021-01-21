<?php

namespace Database\Seeders;

use App\Models\Visits;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 10; $i++) {
            $faker = Faker::create();
            $visit = new Visits();
            $visit->doctor_id = 1;
            $visit->patient_id = $i;
            $visit->reason = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos labore sapiente ipsam adipisci beatae, facere numquam aperiam illum minima, voluptatum quam? Cum, ea? Enim, ipsam? Voluptas molestiae corporis aspernatur architecto.";
            $visit->appointment_dateTime = $faker->dateTime();
            $visit->save();
        }
    }
}
