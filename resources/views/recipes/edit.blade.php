@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="medium-6 columns">
        <h2>Mode edition</h2>
        <form method="PUT" action="{{ url('admin/recettes/1/update') }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="medium-6 columns">
                    <input class="form-control" type="text" name="title" value="{{$recipe->title}}">
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <textarea name="content">{{$recipe->content}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <textarea name="ingredient">{{$recipe->ingredients}}</textarea>
                </div>
            </div>

            <button type="submit" class="button">Editer</button>
            </div>
        </form>
    </div>
@endsection


