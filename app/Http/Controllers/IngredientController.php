<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    public function store()
    {
        //Récupération des données et association au modèle, sauvegarde des données
        $ingredient = new Ingredient();
        $ingredient->name = request('name');
        $ingredient->quantity = request('quantity');
        $ingredient->recipe_id = request('recipe_id');
        $ingredient->save();

        //Récupération des données nécessaire à l'affichage
        $recipe = Recipe::where('id', $ingredient->recipe_id)->get()->first();
        $ingredients = Ingredient::where('recipe_id', request('recipe_id'))->get();

        //Passage des données à la view
        return view('recipes/ajout_ingredient', array(
            'ingredients' => $ingredients,
            'ingredient' => $ingredient,
            'recipe' => $recipe,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        //Recherche des ingredients via l'id de recette
        $ingredients = Ingredient::where('recipe_id', $id)->get();

        //Passage des données à la view
        return view('recipes/edit_ingredient', array(
            'ingredients' => $ingredients,
            'recipe_id' => $id
        ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //Recherche de l'ingrédient via l'id, sauvegarde des modifications
        $ingredient = Ingredient::where('id', $id)->get()->first();
        $input = $request->all();
        $ingredient->fill($input)->save();

        //Récupération des données nécessaire à l'affichage
        $recipe = Recipe::where('id', $ingredient->recipe_id)->first();
        $ingredients = Ingredient::where('recipe_id', $ingredient->recipe_id)->get();
        $comments = Comment::all()->where('recipe_id', $ingredient->recipe_id);

        //Passage des données à la view
        return view('recipes/single', array(
            'recipe' => $recipe,
            'comments' => $comments,
            'ingredients' => $ingredients
        ));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        //Récupération des données via la requête de recherche
        $results = DB::table('recipes')
            ->join('ingredient', function ($join) {
                $join->on('recipes.id', '=', 'ingredient.recipe_id');

            })->where('ingredient.name', 'LIKE', "%{$search}%")
            ->get();

        //Passage des données à la view
        return view('recettes', array(
            'recipes' => $results,
        ));
    }
}
