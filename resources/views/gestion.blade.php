@extends('layouts/main')

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p style="color:#1ee51e">{{ $message }}</p>
        </div>
    @endif

    <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="/gestion/search" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" required placeholder="Rechercher par nom"/>
                        <button type="submit" class="button" >Chercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div>
        @foreach ( $users as $user )
            {{$user->name}}
            <div class="input-group">
                <form method="POST" action="/gestion/update/{{$user->id}}">
                    @csrf
                    <select name="role">
                        <option value={{$user->role}}>--</option>
                        <option value="admin" name="admin">
                            Admin
                        </option>
                        <option value="user" name="user">
                            User
                        </option>
                    </select>
                    <button type="submit" class="button">Editer</button>
                </form>
                <hr>
            </div>
        @endforeach
    </div>

@endsection
