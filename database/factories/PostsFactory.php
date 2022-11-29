<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(20),
            'content' => $this->faker->text(300),
            'category' => $this->faker->sentence(10),
            'status' => $this->faker->randomElement(['publish', 'draft', 'trash'])
        ];
    }
}
