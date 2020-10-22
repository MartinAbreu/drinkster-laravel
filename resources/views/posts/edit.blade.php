@extends('layouts.app')

@section('content')
<div class="container">
<form action="/p/{{ $post->id }}" enctype="form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit Post
                        <hr class="w-100"/>
                    </h2>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" autocomplete="title" maxlength="40" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">caption</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $post->caption }}" autocomplete="caption" maxlength="75" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="ingredients" class="col-md-4 col-form-label">Ingredients</label>

                    <textarea id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') ?? $post->ingredients }}" autocomplete="ingredients" maxlength="75" autofocus>{{ old('ingredients') ?? $post->ingredients }}</textarea>

                    @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="instructions" class="col-md-4 col-form-label">Instructions</label>
                        <textarea id="instructions" type="textarea" class="form-control @error('instructions') is-invalid @enderror" name="instructions" value="{{ old('instructions') ?? $post->instructions }}" autocomplete="instructions" maxlength="255" autofocus>{{ old('instructions') ?? $post->instructions }}</textarea>

                    @error('instructions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row pt-4 pr-2">
                    <button class="btn btn-primary mr-2">Save Post</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete" />
            </form>
        </div>

    </div>

</div>
@endsection
