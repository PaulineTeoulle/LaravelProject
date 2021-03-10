<?php

namespace App\Http\Controllers;


use App\Models\Recipe;

class HomeController extends Controller
{

    public function index()
    {
        //$recipes = \App\Models\Recipe::all(); //get all recipes
        //$recipes = \App\Models\Recipe::where('author_id', 1)->get()->orderByDate(); //get all recipes

        $recipes = Recipe::orderBy('created_at', 'desc')->take(3)->get();
       /* $recipe = \App\Models\Recipe::find(1); //trouver la recette avec l’id 1
        echo $recipe->author->name; //affiche le nom de l’auteur

        $recipes = \App\Models\User::find(1)->recipes; //get recipes from user id 1

        foreach ($recipes as $recipe) {
            //loop on recipes
        }
        */

        return view('welcome',array(
            'recipes' => $recipes,
        ));

    }
}
