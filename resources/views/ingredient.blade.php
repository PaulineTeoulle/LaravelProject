
@extends('layouts/main')

@section('content')

    <ul>
        @foreach ( $ingredients as $ingredient )
            <li>{{$ingredient->name}}</li>
        @endforeach
    </ul>


    <article class="grid-container">
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3>Ajouter un ingrédient : </h3>
                    <div class="callout">
                        <form method="POST" action="/ingredient/create">
                            @csrf
                            @method('POST')
                            <div>
                                @error('name')
                                <p style="color:red">{{$errors->first('name')}}</p>
                                @enderror
                                <input @error('name') style="border-color:red" @enderror type="text" name="name"
                                       placeholder="Nom" value="{{old('name')}}">
                            </div>

                            <div>
                                @error('email')
                                <p style="color:red">{{$errors->first('quantity')}}</p>
                                @enderror
                                <input @error('quantity') style="border-color:red" @enderror type="text" name="quantity"
                                       placeholder="Quantité" value="{{old('quantity')}}">
                            </div>
                            <div>
                                <button type="submit" class="button">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
