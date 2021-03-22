<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $author_id = User::all()->random()->id;
        $recipe_id = Recipe::all()->random()->id;
        return [
            'author_id'=>$author_id,
            'recipe_id' => $recipe_id,
            'content' => $this->faker->text,
            'date' => $this->faker->dateTime,
        ];
    }
}
