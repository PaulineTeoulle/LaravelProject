<?php

namespace Database\Seeders;

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
        \App\Models\Comment::factory(5)->create();

        //\App\Models\User::factory(10)->create();
        //\App\Models\User::factory(5)->has(\App\Models\Recipe::factory()->count(10))->create();
    }
}
