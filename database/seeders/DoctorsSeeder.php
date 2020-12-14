<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $total = count(Doctor::all());
        $doctor = new Doctor();

        $doctor->name = $faker->name('male');
        if($total%2==0){
            $doctor->gender = 'male';
        }else{
            $doctor->gender = 'female';
        }
        $doctor->specialization = $faker->jobTitle;
        $doctor->start_year = $faker->numberBetween(2020,0);
        $doctor->institution = 'Nairobi Hospital';
        $doctor->email = $faker->email;
        $doctor->password = Hash::make('password');
        $doctor->profileImage = 'profile.jpg';

        $doctor->save();

    }
}
