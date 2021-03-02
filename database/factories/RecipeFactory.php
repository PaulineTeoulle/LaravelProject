<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id'=>$this->faker->randomDigitNotNull,
            'title' => $this->faker->text,
            'content' => $this->faker->text,
            'ingredients' => $this->faker->text,
            'url' => $this->faker->url,
            'tags' => $this->faker->text,
            'date' => $this->faker->dateTime,
            'status' =>$this->faker->text
        ];
    }
}
