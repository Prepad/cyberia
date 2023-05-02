<?php

namespace Database\Factories;

use App\Enums\BookTypeEnum;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => fake('ru_RU')->words(3),
            'type' => array_rand(array_column(BookTypeEnum::cases(), 'value')),
            'author_id' => Author::inRandomOrder()->get()->id,
        ];
    }
}
