<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\LiaisonRecipeIngredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $recipes = Recipe::all(); //get all recipes

        // return view('recettes',array(
        //     'recipes' => $recipes,
        // ));

        return response()->json($recipes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show($id) {
        $recipe = Recipe::where('id',$id)->first();
        $comments = Comment::all()->where('recipe_id',$id);
        $ingredients = Ingredient::where('recipe_id',$id)->get();
        $author = User::where('id', $recipe->author_id)->first();
        $recipe->author = $author;
        $response = ["recipe" => $recipe, "comments" => $comments, "ingredients" => $ingredients];
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {

        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //Gestion des images
        //TODO : verif si image existe deja => changer nom
        $urlString = $_SERVER['DOCUMENT_ROOT'];
        $info = pathinfo($urlString);
        $target_dir = $info['dirname'] . '\public\images\\';
        $file = request('media');
        if(isset($file)){
            $filename = $file->getClientOriginalName();
        } else {
            $filename = null;
        }

        $target_file = $target_dir . $filename;
        move_uploaded_file($file, $target_file);

        $recipe = new Recipe();
        $recipe->author_id = Auth::id();
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->url = 'url static'; //STATIQUE
        $recipe->status = 'status static'; //STATIQUE
        // $recipe->ingredients = request('ingredients'); 
        $recipe->media = $filename;
        $recipe->save();
        // return \App::call('App\Http\Controllers\IngredientController@store');    
        return app('App\Http\Controllers\IngredientController')->store($recipe->id ,request('ingredients'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $recipe = Recipe::where('id',$id)->first(); //get first recipe with recipe_nam == $recipe_name
        $ingredients = Ingredient::where('recipe_id',$id)->get();
        $response = ["recipe" => $recipe, "ingredients" => $ingredients];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $input = $request->all();
        $recipe->fill($input)->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredients = Ingredient::where('recipe_id',$id)->get();
        foreach($ingredients as $ingredient){
            $ingredient->delete();
        }
        $recipe->delete();
    }
}
