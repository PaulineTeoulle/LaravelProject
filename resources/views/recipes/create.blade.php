@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="medium-6 columns">
        <h2>Créer une nouvelle recette</h2>
        <form method="POST" action="{{ url('admin/recette') }}" enctype="multipart/form-data">
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
            <div class="row">
                <div class="medium-6 columns">
                <input type="file" name="media">
                </div>
            </div>

            <button type="submit" class="button">Créer</button>
        </form>
    </div>
@endsection


