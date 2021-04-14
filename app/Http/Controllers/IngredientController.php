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
    public function index()
    {
        $ingredients = Ingredient::all();


        return view('ingredient',array(
           'ingredients' => $ingredients,
       ));
    }


    public function store()
    {
        return 'test';
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {

        $ingredients = Ingredient::where('recipe_id',$id)->get();

        $recipe = Recipe::findOrFail($id);


        return view('recipes/edit_ingredient', array( //Pass the recipe to the view
            'ingredients' => $ingredients,
            'recipe_id' => $id
        ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $ingredient = Ingredient::where('id',$id)->get()->first();

        $input = $request->all();
        $ingredient->fill($input)->save();

        $recipe = Recipe::where('id', $ingredient->recipe_id)->first();
        $ingredients = Ingredient::where('recipe_id',$ingredient->recipe_id)->get();

        $comments = Comment::all()->where('recipe_id',$ingredient->recipe_id);

        return view('recipes/single', array(
            'recipe' => $recipe,
            'comments' =>$comments,
            'ingredients' =>$ingredients
        ));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = DB::table('recipes')
            ->join('ingredient', function($join)
            {
                $join->on('recipes.id', '=', 'ingredient.recipe_id');

            })->where('ingredient.name', 'LIKE',"%{$search}%")
            ->get();

        return view('recettes', array(
            'recipes' => $results,
        ));
    }
}
