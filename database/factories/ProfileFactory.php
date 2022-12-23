<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tel' => $this->faker->phoneNumber,
            'title' => $this->faker->title,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'date_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'country' => $this->faker->country,
            'district' => $this->faker->city,
            // 'img'      => 'b/vendors/images/photo1.jpg'
        ];
    }
}
