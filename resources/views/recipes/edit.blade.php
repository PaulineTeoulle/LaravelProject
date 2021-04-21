@extends('layouts.main')


@section('content')
    <div class="row">
        <h2>Mode edition</h2>
        <form method="POST" action="/admin/recette/{{$recipe->id}}">
            @method('PUT')
            @csrf
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
                    <input type="hidden" name="media" value="{{$recipe->media}}">
                </div>
            </div>
            <button type="submit" class="button">Editer</button>
        </form>
    </div>
@endsection


