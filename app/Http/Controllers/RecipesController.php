<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

        return view('recettes',array(
            'recipes' => $recipes,
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show($id) {
        $recipe = Recipe::where('id',$id)->first();

        $ingredients = Ingredient::where('recipe_id',$id)->get();
        $comments = Comment::all()->where('recipe_id',$id);
         return view('recipes/single', array(
                'recipe' => $recipe,
                'comments' =>$comments,
             'ingredients' =>$ingredients
         ));
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
        if($file!=null)
            $filename = $file->getClientOriginalName();
        else
            $filename = null;

        $target_file = $target_dir . $filename;
        move_uploaded_file($file, $target_file);

        $recipe = new Recipe();
        $recipe->author_id = Auth::id();
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->url = 'url static'; //STATIQUE
        $recipe->status = 'status static'; //STATIQUE
        $recipe->media = $filename; //STATIQUE
        $recipe->save();


        $recipe = Recipe::where('id', $recipe->id)->get()->first();
        $ingredients = Ingredient::where('id', $recipe->id)->get();
        return view('recipes/ajout_ingredient', array( //Pass the recipe to the view
            'recipe' => $recipe,
            'ingredients'=> $ingredients
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
        $recipe = Recipe::where('id',$id)->first(); //get first recipe with recipe_nam == $recipe_name

        return view('recipes/edit', array( //Pass the recipe to the view
            'recipe' => $recipe
        ));
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


        return view('recipes/single', array(
            'recipe' => $recipe
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function destroy($id)
    {
        Recipe::findOrFail($id)->delete();
        $recipes = Recipe::all();
        return view('recettes',array(
            'recipes' => $recipes,
        ));
    }

}
