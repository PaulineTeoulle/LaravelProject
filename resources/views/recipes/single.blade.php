@extends('layouts/main')

@section('content')

    Titre : {{$recipe->title}} <br><br>
    Auteur : {{$recipe->author->name}}<br><br>
    Content : {{$recipe->content}}<br><br>
    Ingrédients : {{$recipe->ingredients}}<br><br>

    <form method="GET" action="/admin/recettes/{{$recipe->id}}/edit">
        @method('GET')
        @csrf
        <button type="submit" class="button">Editer</button>
    </form>

    <form method="POST" action="/admin/recettes/{{$recipe->id}}">
        @method('DELETE')
        @csrf
        <button type="submit" class="button">Supprimer</button>
    </form>
@endsection
