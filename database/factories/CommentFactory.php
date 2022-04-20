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
            'user_id'=> $this->faker->numberBetween(1,50),
            'post_id'=> $this->faker->numberBetween(1,50),
            'commentable_id'=>rand(1,50)
        ];
    }
}
