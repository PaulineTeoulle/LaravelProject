<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        //Récupération des données et association au modèle, sauvegarde des données
        $comment = new Comment();
        $comment->author_id = Auth::user()->id;
        $comment->recipe_id = request('recipe_id');
        $comment->content = request('content');
        $comment->date = date('Y-m-d H:i:s');
        $comment->save();

        //Récupération des données nécessaire à l'affichage
        $recipe = Recipe::where('id', $comment->recipe_id)->first();
        $comments = Comment::all()->where('recipe_id', $comment->recipe_id);
        $ingredients = Ingredient::where('recipe_id', $comment->recipe_id)->get();

        //Passage des données à la view
        return view('recipes/single', array(
            'recipe' => $recipe,
            'comments' => $comments,
            'ingredients' => $ingredients
        ));
    }

    public function destroy($id)
    {
        //Recherche du commentaire via l'id, suppression du commentaire
        $comment = Comment::where('id', $id)->first();
        Comment::where('id', $comment->id)->first()->delete();

        //Récupération des données nécessaire à l'affichage
        $recipe = Recipe::where('id', $comment->recipe_id)->first();
        $comments = Comment::all()->where('recipe_id', $comment->recipe_id);
        $ingredients = Ingredient::where('recipe_id', $id)->get();

        //Passage des données à la view
        return view('/recipes/single', array(
            'recipe' => $recipe,
            'comments' => $comments,
            'ingredients' => $ingredients
        ));
    }
}
