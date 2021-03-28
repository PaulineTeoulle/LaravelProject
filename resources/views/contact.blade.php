@extends('layouts.main')


@section('content')
    <article class="grid-container">
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    @if(Auth::user()&& Auth::user()->isAdmin())
                        <h3>Liste des contacts déjà enregistrés : </h3>
                        <div class="callout">
                            @foreach ($contacts as $contact)
                                <ul class="menu simple">
                                    <li><b>Nom :</b> {{$contact->name}} <b> Mail : </b>{{ $contact->email }} <br></li>
                                </ul>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </article>
    <article class="grid-container">
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3>Créer un contact : </h3>
                    <div class="callout">
                        <form method="POST" action="/contact/create">
                            @csrf
                            <div>
                                @error('name')
                                <p style="color:red">{{$errors->first('name')}}</p>
                                @enderror
                                <input @error('name') style="border-color:red" @enderror type="text" name="name"
                                       placeholder="Nom" value="{{old('name')}}">
                            </div>

                            <div>
                                @error('email')
                                <p style="color:red">{{$errors->first('email')}}</p>
                                @enderror
                                <input @error('email') style="border-color:red" @enderror type="email" name="email"
                                       placeholder="Email" value="{{old('email')}}">
                            </div>

                            <div>
                                @error('message')
                                <p style="color:red">{{$errors->first('message')}}</p>
                                @enderror
                                <textarea @error('message') style="border-color:red" @enderror name="message"
                                          placeholder="Message">{{old('message')}}</textarea>
                            </div>

                            <div>
                                <button type="submit" class="button">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>


@endsection
