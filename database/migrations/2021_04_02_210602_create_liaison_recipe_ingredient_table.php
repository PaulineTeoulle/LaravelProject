<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiaisonRecipeIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liaison_recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->integer('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->integer('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liaison_recipe_ingredient');
    }
}
