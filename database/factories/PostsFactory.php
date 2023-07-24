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
            //fillables are the columns that can be filled with data
            "title"=>$this->faker->sentence(3),
            "description"=>$this->faker->paragraph(3),
        ];
    }
}