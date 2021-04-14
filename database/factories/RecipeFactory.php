<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
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
        $author_id = User::all()->random()->id;

        return [
            'author_id'=> $author_id,
            'title' => $this->faker->text,
            'content' => $this->faker->text,
            'url' => $this->faker->url,
            'tags' => $this->faker->text,
            'date' => $this->faker->dateTime,
            'status' =>$this->faker->text
        ];
    }
}
