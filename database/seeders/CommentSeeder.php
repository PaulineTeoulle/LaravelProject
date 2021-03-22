<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()->count(10)->create();

        //User::factory(10)->create();
        //\User::factory(5)->has(Recipe::factory()->count(10))->create();
    }
}
