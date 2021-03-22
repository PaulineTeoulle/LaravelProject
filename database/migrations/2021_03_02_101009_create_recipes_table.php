<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('title');
            $table->string('content');
            $table->string('ingredients');
            $table->string('url');
            $table->string('tags')->nullable();
            $table->dateTime('date')->useCurrent();
            $table->string('status');
            $table->string('media')->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
