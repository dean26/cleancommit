<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory;

class EmployeesTableSeeder extends Seeder
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
        for($i = 0; $i < 50; $i++){
            Employee::create([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'company_id' => rand(1,20)
            ]);    
        }
    }
}
