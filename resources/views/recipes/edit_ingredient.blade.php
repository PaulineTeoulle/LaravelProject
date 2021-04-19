@extends('layouts.main')


@section('content')
    <div class="row">
        <h2>Mode edition</h2>

        @csrf
        @foreach($ingredients as $ingredient)
            <form method="POST" action="/ingredient/update/{{$ingredient->id}}">
                @csrf
                @method('POST')
                <div class="input-group">
                    <input class="form-control" type="text" name="name" value="{{$ingredient->name}}">
                    <input class="form-control" type="text" name="quantity" value="{{$ingredient->quantity}}">
                    <button type="submit" class="button">Editer</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
