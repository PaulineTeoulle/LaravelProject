<?php

namespace App\Http\Controllers;


use App\Models\Recipe;

class HomeController extends Controller
{

    public function index()
    {
        //Recherche des 3 dernières recettes créés
        $recipes = Recipe::orderBy('created_at', 'desc')->take(3)->get();

        //Passage des données à la view
        return view('welcome', array(
            'recipes' => $recipes,
        ));
    }
}
