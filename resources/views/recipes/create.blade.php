@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="medium-6 columns">
        <h2>Créer une nouvelle recette</h2>
        <form method="POST" action="{{ url('recettes/create') }}">
            @csrf
            <div class="row">
                <div class="medium-6 columns">
                    <input class="form-control" type="text" name="title" placeholder="Titre de la recette">
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <textarea name="content" placeholder="Description de la recette"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <textarea name="ingredients" placeholder="Ingrédients de la recette"></textarea>
                </div>
            </div>

            <button type="submit" class="button">Créer</button>
            </div>
        </form>
    </div>
@endsection


