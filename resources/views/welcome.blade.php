
    @extends('layouts/main')

    @section('content')

        Les 3 dernières recettes sont :
        <br>
        <br>
        <ul>
            @foreach ( $recipes as $recipe )
                <li><a href="/recette/{{$recipe->id}}">{{ $recipe->title }} </a></li>

            @endforeach
        </ul>
    @endsection
