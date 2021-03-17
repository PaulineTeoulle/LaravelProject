@extends('layouts/main')

@section('content')

    Titre : {{$recipe->title}} <br><br>
    Auteur : {{$recipe->author->name}}<br><br>
    Content : {{$recipe->content}}<br><br>
    Ingrédients : {{$recipe->ingredients}}<br><br>

    <img src="{{$recipe->media}}">

    <form method="GET" action="/admin/recette/{{$recipe->id}}/edit">
        @method('GET')
        @csrf
        <button type="submit" class="button">Editer</button>
    </form>

    <form method="POST" action="/admin/recette/{{$recipe->id}}">
        @method('DELETE')
        @csrf
        <button type="submit" class="button">Supprimer</button>
    </form>


    <h2>Ajouter un commentaire :</h2>
    <form method="POST" action="/comment/create">
        @csrf
            <input value="{{$recipe->id}}" type="hidden" name="id"/>
            <textarea type="text" name="content" placeholder="Commentaire"></textarea>
            <button type="submit" class="button">Envoyer</button>
    </form>

    <div>
        <h2>Liste des commentaires : </h2>
        @foreach ( $comments as $comment )

            <li>
                <b>Date : </b>
                {{ $comment->date}}
                <b>Nom : </b>
                {{$comment->author->name}}
                <b>Contenu :</b>
                {{ $comment->content}}
            </li>
        @endforeach
        <br>
    </div>
@endsection
