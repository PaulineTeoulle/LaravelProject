
@extends('layouts/main')

@section('content')
    <div>
        @foreach ( $users as $user )
            {{$user->name}}

            <form method="POST" action="/gestion/update/{{$user->id}}">
                @csrf
                <select name="role">

                    <option value="" >--</option>
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
        @endforeach

    </div>

@endsection
