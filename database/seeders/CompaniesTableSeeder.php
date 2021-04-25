<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for($i = 0; $i < 20; $i++){
            Company::create([
                'name' => $faker->company(),
                'email' => $faker->email(),
                'website' => $faker->url()
            ]);    
        }

    }
}
