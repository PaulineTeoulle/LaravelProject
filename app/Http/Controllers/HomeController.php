<?php

namespace App\Http\Controllers;


use App\Models\Recipe;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->take(3)->get();

        return view('welcome',array(
            'recipes' => $recipes,
        ));

    }
}
