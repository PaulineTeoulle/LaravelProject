
    @extends('layouts/main')

    @section('content')
        <br>
        <br>
        <ul>
            @foreach ( $recipes as $recipe )
                <li><a href="/recettes/{{$recipe->id}}">{{ $recipe->title }} </a></li>
            @endforeach
        </ul>
    @endsection
