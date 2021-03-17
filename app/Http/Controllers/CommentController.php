<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller{
    public function index()
    {
        $comments = Comment::all();
        return view('recipes/single', array(
            'comments' => $comments,
        ));
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->author_id = 1;
        $comment->recipe_id = request('id');
        $comment->content = request('content');
        $comment->date = date('Y-m-d H:i:s');
        $comment->save();

        $recipe = Recipe::where('id',$comment->recipe_id)->first();
        $comments = Comment::all()->where('recipe_id',$comment->recipe_id);

        return view('/recipes/single',  array(
            'recipe' => $recipe,
            'comments' =>$comments,
        ));
    }

    public function show()
    {

    }

}
