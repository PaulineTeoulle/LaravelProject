<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        //Récupération de toutes les recettes
        $recipes = Recipe::all();

        //Passage des données à la view
        return view('recettes', array(
            'recipes' => $recipes,
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show($id)
    {
        //Récupération des données nécessaire à l'affichage
        $recipe = Recipe::where('id', $id)->first();
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        $comments = Comment::all()->where('recipe_id', $id);

        //Passage des données à la view
        return view('recipes/single', array(
            'recipe' => $recipe,
            'comments' => $comments,
            'ingredients' => $ingredients
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        //Retourne la bonne view
        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //Récupération des données nécessaire aux images
        $urlString = $_SERVER['DOCUMENT_ROOT'];
        $info = pathinfo($urlString);
        $target_dir = $info['dirname'] . '\public\images\\';
        $file = request('media');
        if ($file != null)
            $filename = $file->getClientOriginalName();
        else
            $filename = null;
        $target_file = $target_dir . $filename;
        move_uploaded_file($file, $target_file);

        //Récupération des données et association au modèle, sauvegarde des données
        $recipe = new Recipe();
        $recipe->author_id = Auth::id();
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->url = 'url static'; //STATIQUE
        $recipe->status = 'status static'; //STATIQUE
        $recipe->media = $filename;
        $recipe->save();

        //Récupération des données nécessaire à l'affichage
        $recipe = Recipe::where('id', $recipe->id)->get()->first();
        $ingredients = null;

        //Passage des données à la view
        return view('recipes/ajout_ingredient', array(
            'recipe' => $recipe,
            'ingredients' => $ingredients
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
        //Recherche de la bonne recette via l'id
        $recipe = Recipe::where('id', $id)->first();

        //Passage des données à la view
        return view('recipes/edit', array(
            'recipe' => $recipe
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function update(Request $request, $id)
    {
        //Recherche de la bonne recette via l'id, sauvegarde des modifications
        $recipe = Recipe::findOrFail($id);
        $input = $request->all();
        $recipe->fill($input)->save();

        //Récupération des données nécessaire à l'affichage
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        $comments = Comment::all()->where('recipe_id', $id);

        //Passage des données à la view
        return view('recipes/single', array(
            'recipe' => $recipe,
            'comments' => $comments,
            'ingredients' => $ingredients
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function destroy($id)
    {
        //Recherche des ingrédients associé à la recette
        $ingredients = Ingredient::where('recipe_id', $id)->get()->all();
        //Suppression de tous les ingrédients avant suppression de la recette
        if ($ingredients != null) {
            foreach ($ingredients as $ingredient) {
                $ingredient->delete();
            }
        }
        Recipe::where('id', $id)->first()->delete();

        //Récupération des données nécessaire à l'affichage
        $recipes = Recipe::all();

        //Passage des données à la view
        return view('recettes', array(
            'recipes' => $recipes,
        ));
    }
}
