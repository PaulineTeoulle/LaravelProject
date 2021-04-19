@extends('layouts.main')


@section('content')
    <article class="grid-container">
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3>Créer une nouvelle recette </h3>
                    <div class="callout">
                        <form method="POST" action="{{ url('admin/recette') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="medium-6 columns">
                                    @error('title')
                                    <p style="color:red">{{$errors->first('title')}}</p>
                                    @enderror
                                    <input class="form-control" type="text" name="title"
                                           placeholder="Titre de la recette" value="{{old('title')}}">
                                </div>

                            </div>

                            <div class="row">
                                <div class="medium-6 columns">
                                    @error('content')
                                    <p style="color:red">{{$errors->first('content')}}</p>
                                    @enderror
                                    <textarea name="content"
                                              placeholder="Description de la recette">{{old('content')}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="medium-6 columns">
                                    @error('media')
                                    <p style="color:red">{{$errors->first('media')}}</p>
                                    @enderror
                                    <input type="file" name="media">
                                </div>
                            </div>
                            <button type="submit" class="button">Ajouter les ingrédients</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection


