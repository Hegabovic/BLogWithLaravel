<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comments' =>Str::random(20),
            'users_id'=> $this->faker->numberBetween(1,50),
            'posts_id'=> $this->faker->numberBetween(1,50)
        ];
    }
}
