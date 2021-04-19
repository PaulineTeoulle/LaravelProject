@extends('layouts/main')

@section('content')

    <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="/ingredient/search" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" required placeholder="Rechercher par ingrédient"/>
                        <button type="submit" class="button">Chercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(Auth::check())
        <form method="GET" action="/admin/recette/create">
            @csrf
            <button type="submit" class="button">Ajouter une recette</button>
        </form>
    @endif

    Liste de toutes les recettes :

    <ul>
        @foreach ( $recipes as $recipe )
            <li><a href="/recette/{{$recipe->id}}">{{ $recipe->title }} </a></li>
        @endforeach
    </ul>
    <ul>

    </ul>
@endsection


