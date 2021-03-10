<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index()
    {
        $recipes = \App\Models\Recipe::all(); //get all recipes

        return view('recettes',array(
            'recipes' => $recipes,
        ));
    }
    public function show($title) {
        $recipe = \App\Models\Recipe::where('title',$title)->first(); //get first recipe with recipe_nam == $recipe_name

        return view('recipes/single', array( //Pass the recipe to the view
            'recipe' => $recipe
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }




}
