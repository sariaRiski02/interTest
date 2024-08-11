<?php

namespace Database\Seeders;

use App\Models\Divition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divition = new Divition;

        $dummyData = ['Mobile Apps', 'QA', 'Full Stack', 'Backend', 'Frontend', 'UI/UX Designer'];

        foreach ($dummyData as $i) {
            $divition->create(
                [
                    'name' => $i
                ]

            );
        }
    }
}
