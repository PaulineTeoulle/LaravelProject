@extends('layouts.main')


@section('content')
    <h2>Créer un nouveau contact</h2>

    <div>
        <form method="POST" action="/recipe">
            @csrf
            <div>
                <label>
                    <input type="text" name="title" placeholder="Titre de la recette">
                </label>
            </div>
            <div>
                <label>
                    <textarea name="content" placeholder="Description de la recette"></textarea>
                </label>
            </div>
            <div>
                <label>
                    <textarea name="content" placeholder="Ingrédients de la recette"></textarea>
                </label>
            </div>

            <div>
                <button type="submit">Créer la recette</button>
            </div>
        </form>
    </div>
@endsection


