<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PhoneListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'phone' => $this->faker->phoneNumber(),
            'uid' => $this->faker->unique()->numberBetween(5000, 7000),
            'email' => $this->faker->unique()->safeEmail(),
            'first_name' => $this->faker->userName(),
            'last_name' => $this->faker->userName(),
            'gender' => $this->faker->randomElements(['male', 'female']),
            'country' => $this->faker->country(),
            'location' => $this->faker->address(),
            'hometown' => $this->faker->country(),
            'relationship_status' => $this->faker->randomElements(['single', 'married']),
            'education_last_year' => $this->faker->year(),
            'work' => $this->faker->address(),
        ];
    }

}
