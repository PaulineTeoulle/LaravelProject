<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredient = Ingredient::all(); //get all recipes

        return view('ingredient',array(
            'ingredients' => $ingredient,
        ));
    }

    public function store()
    {
        $ingredient = new Ingredient();
        $ingredient->name = request('name');
        $ingredient->quantity = request('quantity');
        $ingredient->save();
        return redirect('/ingredient');
    }
}
