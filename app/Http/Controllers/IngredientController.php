<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();


        return view('ingredient',array(
           'ingredients' => $ingredients,
       ));
    }


    public function store()
    {
        $ingredient = new Ingredient();
        $ingredient->name = request('name');
        $ingredient->quantity = request('quantity');
        $ingredient->recipe_id = request('recipe_id');
        $ingredient->save();

        $recipe = Recipe::where('id',$ingredient->recipe_id)->get()->first();

        $ingredients = Ingredient::where('recipe_id',request('recipe_id'))->get();

        return view('recipes/ajout_ingredient',array(
            'ingredients' => $ingredients,
            'ingredient' => $ingredient,
            'recipe' =>$recipe,
        ));


    }
}
