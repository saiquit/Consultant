<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->company . ' Services';
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->sentences(3, true),
            'about' => $this->faker->sentences(3, true),
        ];
    }
}
