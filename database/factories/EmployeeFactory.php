<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {



        return [
            'name' => $this->faker->name,
            'division_id' => Division::inRandomOrder()->first()->id,
            'phone' => $this->faker->phoneNumber,
            'image' => $this->faker->imageUrl(),
            'position' => $this->faker->jobTitle,
        ];
    }
}
