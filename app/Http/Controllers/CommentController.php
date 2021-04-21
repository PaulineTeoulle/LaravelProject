<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->author_id = Auth::user()->id;
        $comment->recipe_id = request('recipe_id');
        $comment->content = request('content');
        $comment->date = date('Y-m-d H:i:s');
        $comment->save();

        $recipe = Recipe::where('id',$comment->recipe_id)->first();
        $comments = Comment::all()->where('recipe_id',$comment->recipe_id);
        $ingredients = Ingredient::where('recipe_id',$comment->recipe_id)->get();
        //$comments = Comment::all()->where('recipe_id',$id);
        return view('recipes/single', array(
            'recipe' => $recipe,
            'comments' =>$comments,
            'ingredients' =>$ingredients
        ));
    }

    public function show()
    {

    }

    public function destroy($id){
        $comment = Comment::where('id',$id)->first();
        Comment::where('id', $comment->id)->first()->delete();

        $recipe = Recipe::where('id',$comment->recipe_id)->first();
        $comments = Comment::all()->where('recipe_id',$comment->recipe_id);
        $ingredients = Ingredient::where('recipe_id',$id)->get();

        return view('/recipes/single',  array(
            'recipe' => $recipe,
            'comments' =>$comments,
            'ingredients' =>$ingredients
        ));
    }

}
