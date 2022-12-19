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
            'full_name' => $this->faker->name,
            'address' => $this->faker->address,
            'date_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'country' => $this->faker->country,
            'district' => $this->faker->city,
            'complete' => true,
            // 'img'      => 'b/vendors/images/photo1.jpg'
        ];
    }
}
