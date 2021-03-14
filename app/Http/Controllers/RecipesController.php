<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show($title) {
        $recipe = Recipe::where('title',$title)->first(); //get first recipe with recipe_nam == $recipe_name

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
        return view('recipes/create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("ok");
        $recipe = new Recipe(); 
        $recipe->author_id = 1;
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->ingredients = request('ingredients');
        $recipe->url = 'url static'; //STATIQUE
        $recipe->date = date('Y-m-d H:i:s');
        $recipe->status = 'status static'; //STATIQUE
        $recipe->save();

        return redirect('/recettes'); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
