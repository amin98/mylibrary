<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookCopyFactory extends Factory
{
    /**
 * Define the model's default state.
 *
 * @return array
 */
    public function definition()
    {
        return [
            'book_id' => 7
        ];
    }
}
