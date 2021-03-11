
    @extends('layouts.main')


    @section('content')

        <div>
            <h2>Liste des contacts déjà enregistrés : </h2>
            @foreach ( $contacts as $contact )

                <li> <b>Nom : </b> {{$contact->name}} <b>Mail : </b>
                  {{ $contact->email }}</li>
            @endforeach
            <br>
        </div>


        <div>

           <h2>Créer un contact :</h2>
            <form method="POST" action="/contact/create">
                @csrf
                <div>

                        @error('name')
                        <p style="color:red">{{$errors->first('name')}}</p>
                        @enderror
                        <input @error('name') style="border-color:red" @enderror type="text" name="name" placeholder="Nom" value="{{old('name')}}">

                </div>
                <div>

                        @error('email')
                            <p style="color:red">{{$errors->first('email')}}</p>
                        @enderror
                        <input  @error('email') style="border-color:red" @enderror type="text" name="email" placeholder="Email" value="{{old('email')}}">

                </div>
                <div>
                        @error('message')
                            <p style="color:red">{{$errors->first('message')}}</p>
                        @enderror
                        <textarea  @error('message') style="border-color:red" @enderror name="message" placeholder="Message"></textarea>

                </div>
                <div>
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    @endsection
