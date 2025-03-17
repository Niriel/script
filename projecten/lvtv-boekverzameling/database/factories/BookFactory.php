<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Some books may not have an author.
            'author_id' => (
                rand(0, 100) < 60 ?
                Author::inRandomOrder()->first()->id :
                null),
            'title' => $this->faker->sentence,
            // Several kinds of ISBN.
            'isbn' => (
                rand(0, 100) < 60 ?
                $this->faker->optional(0.8)->isbn13 :
                $this->faker->optional(0.8)->isbn10),
        ];
    }
}
