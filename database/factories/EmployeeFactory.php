<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(50),
            'username' => $this->faker->text(50),
            'password' => $this->faker->text(50),
            'identity' => $this->faker->text(50),
            'address' => $this->faker->text(50),
            'phone' => $this->faker->text(50),
            'datesigned' => $this->faker->date('Y-m-d', 'now')
        ];
    }
}
