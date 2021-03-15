
@extends('layouts/main')

@section('content')

    Titre : {{$recipe->title}} <br><br>
    Auteur : {{$recipe->author->name}}<br><br>
    Content : {{$recipe->content}}<br><br>
    Ingrédients : {{$recipe->ingredients}}<br><br>

    <button><a href="/admin/recettes/{{$recipe->id}}/edit">Edit</a></button>

@endsection
