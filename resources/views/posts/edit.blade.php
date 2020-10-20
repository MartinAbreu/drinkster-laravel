@extends('layouts.app')

@section('content')
<div class="container">
<form action="/p/{{ $post->id }}" enctype="form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2> <u>Edit Post</u> </h2>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">caption</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $post->caption }}" autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
