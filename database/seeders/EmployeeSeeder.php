<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Employee::create([
                'name' => 'Employee ' . $i,
                'division_id' => Division::inRandomOrder()->first()->id,
                'phone' => "08123456789$1",
                'image' => 'https://via.placeholder.com/150-' . $i,
                'position' => 'Position ' . $i,
            ]);
        }
    }
}
