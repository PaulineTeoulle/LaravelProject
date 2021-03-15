
@extends('layouts/main')

@section('content')

    Titre : {{$recipe->title}} <br><br>
    Auteur : {{$recipe->author->name}}<br><br>
    Content : {{$recipe->content}}<br><br>
    Ingrédients : {{$recipe->ingredients}}<br><br>

    <button><a href="/admin/recettes/{{$recipe->id}}/edit">Edit</a></button>


        <form method="POST" action="/admin/recettes/{{$recipe->id}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="button">Delete</button>
        </form>
@endsection
