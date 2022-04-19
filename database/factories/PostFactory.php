<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' =>Str::random(4).' Book',
            'post_creator' => $this->faker->name(),
            'description'=> $this->faker->text,
            'user_id'=> $this->faker->numberBetween(1,50)
        ];
    }
}
