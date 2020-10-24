@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row" >
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Add New Recipe</h2>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Caption</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" maxlength="75" autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="ingredients" class="col-md-4 col-form-label">Ingredients</label>

                    <textarea id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') ?? $post->ingredients ?? '' }}" autocomplete="ingredients" maxlength="255" rows="4" autofocus></textarea>

                    @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="instructions" class="col-md-4 col-form-label">Instructions</label>

                    <textarea id="instructions" type="textarea" class="form-control @error('instructions') is-invalid @enderror" name="instructions" value="{{ old('instructions') ?? $post->instructions ?? '' }}" autocomplete="instructions" maxlength="255" rows="4" autofocus></textarea>

                    @error('instructions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Upload Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
