@extends('layouts/main')

@section('content')


    @if($ingredients)
    @foreach($ingredients as $ingredient)
       <div>
           Nom : {{ $ingredient->name }} | Quantité : {{ $ingredient->quantity}}
       </div>
    @endforeach
    @endif



    <form action="/ingredient/create" method="POST">
        @csrf
        <div class="input-group">
            <input hidden value="{{$recipe->id}}" name="recipe_id">
            <input type="text" name="name"  placeholder="Ingredient">
            <input type="text" name="quantity"  placeholder="Quantité">
            <button type="submit" class="button">Ajouter à la recette</button>
        </div>

    </form>

    <form action="/recettes" >
    <button type="submit" class="button">Valider</button>
@endsection
