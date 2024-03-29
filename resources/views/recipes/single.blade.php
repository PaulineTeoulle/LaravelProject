@extends('layouts/main')

@section('content')
    <article>
        <div class="grid-x grid-margin-x">
            <div class="medium-6 cell">
                @if ($recipe->media)
                    <img class="thumbnail" src="{{ asset('/images/'.$recipe->media) }}" alt="Image de la recette">
                @endif

            </div>
            <div class="medium-6 large-5 cell large-offset-1">
                <h3>{{$recipe->title}}</h3>
                Auteur : {{$recipe->author->name}}<br><br>
                Contenu : {{$recipe->content}}<br><br>

                @if(Auth::user() && Auth::user()->id == $recipe->author->id)
                    <form method="GET" action="/admin/recette/{{$recipe->id}}/edit">
                        @method('GET')
                        @csrf
                        <button type="submit" class="button">Editer le titre et le contenu</button>
                    </form>
                @endif

                Ingredients et quantité:

                @foreach($ingredients as $ingredient)
                    <div>
                        {{ $ingredient->name }} | {{ $ingredient->quantity}}
                    </div>
                @endforeach

                @if(Auth::user() && Auth::user()->id == $recipe->author->id)
                    <form method ="GET" action="/ingredient/edit/{{$recipe->id}}">
                        @method('GET')
                        <button type="submit" class="button">Modifier les ingrédients</button>
                    </form>
                @endif

                @if((Auth::user() && Auth::user()->id == $recipe->author->id) || (Auth::user() && Auth::user()->isAdmin()))
                    <form method="POST" action="/admin/recette/{{$recipe->id}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button">Supprimer</button>
                    </form>
                @endif
            </div>
        </div>
    </article>



    <div class="">
        <hr>
        <div class="tabs-content" data-tabs-content="example-tabs">
            <div class="tabs-panel is-active" id="panel1">
                <h3>Commentaires</h3>
                <div class="media-object stack-for-small">
                    <div cass="media-object-section">
                        @foreach ( $comments as $comment )
                            <h5>{{$comment->author->name }} <small>({{  $comment->date}})</small></h5>
                            <p>{{ $comment->content}}</p>

                            @if((Auth::user() && Auth::user()->id == $comment->author->id) || (Auth::user() && Auth::user()->isAdmin()))
                                <form method="POST" action="/comment/delete/{{$comment->id}}">
                                    @csrf
                                    <button type="submit" class="button">Supprimer</button>
                                </form>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if(Auth::check())

                    <label>
                        Ajouter un commentaire :
                        <form method="POST" action="/comment/create">
                            @csrf
                            <input value="{{$recipe->id}}" type="hidden" name="recipe_id"/>
                            <label>
                   <textarea type="text" name="content"
                             placeholder="Ecrivez votre commentaire ici"></textarea>
                            </label>
                            <button type="submit" class="button">Envoyer</button>
                        </form>
                    </label>
                @endif
            </div>

        </div>
    </div>
@endsection
