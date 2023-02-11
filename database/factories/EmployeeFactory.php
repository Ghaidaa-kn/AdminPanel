<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "company_id" => Company::inRandomOrder()->first()->id,
            "email" => $this->faker->unique()->safeEmail(),
            "phone" => $this->faker->phoneNumber(),
        ];
    }
}
