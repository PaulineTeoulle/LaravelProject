
    @extends('layouts/main')

    @section('content')
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
    @endsection
