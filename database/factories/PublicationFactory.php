<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 200),
            'content' => $this->faker->text($maxNbChars = 200),
            'likes'=>$this->faker->numberBetween($min=0, $max=1000),
            'user_id'=>$this->faker->randomDigitNotNull
        ];
    }
}
