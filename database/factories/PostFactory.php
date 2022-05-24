<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "tittle" => $this->faker->text(20),
            "slug"=>$this->faker->text(20),
            "excerpt" => $this->faker->text(),
            "body" => $this->faker->text(),
            "category_id" => rand(1, 4),
            "author"=>$this->faker->text(10)
        ];
    }
}
