<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['category'=>'Allergy & Immunology']);
        Category::create(['category'=>'Anesthesiology']);
        Category::create(['category'=>'Dermatology']);
        Category::create(['category'=>'Diagnostic Radiology']);
        Category::create(['category'=>'Emergency Medicine']);
        Category::create(['category'=>'Family Medicine']);
        Category::create(['category'=>'Internal Medicine']);
        Category::create(['category'=>'Medical Genetics']);
        Category::create(['category'=>'Neurology']);
        Category::create(['category'=>'Nuclear Medicine']);
        Category::create(['category'=>'Obstetrics and Gynecology']);
        Category::create(['category'=>'Ophthamology']);
        Category::create(['category'=>'Pathology']);
        Category::create(['category'=>'Paediatrics']);
        Category::create(['category'=>'Physical Medicine & Rehabilitation']);
        Category::create(['category'=>'Preventive Medicine']);
        Category::create(['category'=>'Psychiatry']);
        Category::create(['category'=>'Radiation Oncology']);
        Category::create(['category'=>'Surgery']);
        Category::create(['category'=>'Urology']);
    }
}
