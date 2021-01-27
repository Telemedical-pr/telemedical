<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersSeeder::patient();
        UsersSeeder::doctor();
        UsersSeeder::admin();


    }

    public static function patient()
    {
        $faker = Faker::create();
        $user = new User();
        $user->name = 'Abbas Kubaffu';
        $user->DOB = $faker->date();
        $user->gender = 'male';
        $user->image = 'default.jpg';
        $user->email = 'user.example@teleconsult.com';
        $user->password = Hash::make('1234567890');
        $user->last_temp = $faker->numberBetween(30,40);
        $user->last_weight = 70.89;
        $user->unit_weight = 'KG';
        $user->last_height = 178.3;
        $user->unit_height = 'CM';

        $user->save();
    }
    public static function doctor()
    {
        $faker = Faker::create();
        $user = new User();
        $user->name = 'Charles Peter';
        $user->DOB = $faker->date();
        $user->gender = 'male';
        $user->image = 'default.jpg';
        $user->specialization = $faker->numberBetween(1,20);
        $user->email = 'doctor.example@teleconsult.com';
        $user->password = Hash::make('1234567890');
        $user->last_temp = $faker->numberBetween(30,40);
        $user->start_year = 2005;
        $user->institution = 'Agha Khan';
        $user->is_patient = false;
        $user->is_doctor = true;

        $user->save();
    }
    public static function admin()
    {
        $faker = Faker::create();
        $user = new User();
        $user->name = 'Administrator';
        $user->DOB = $faker->date();
        $user->gender = 'female';
        $user->email = 'admin@teleconsult.com';
        $user->password = Hash::make('1234567890');
        $user->last_temp = $faker->numberBetween(30,40);
        $user->is_patient = false;
        $user->is_admin = true;

        $user->save();
    }



}
