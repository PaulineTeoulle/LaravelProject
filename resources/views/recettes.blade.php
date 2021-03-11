
    @extends('layouts/main')

    @section('content')
        <br>
        <br>
        <ul>
            @foreach ( $recipes as $recipe )
                <li><a href="/recette/{{$recipe->title}}">{{ $recipe->title }} </a></li>
            @endforeach
        </ul>
    @endsection
