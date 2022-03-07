<?php

namespace Database\Factories\ToDoApp;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'details' => $this->faker->sentence(),
            'user_id' => rand(1,10),
        ];
    }
}
