@extends('layouts.app')

@section('content')
@if ($userFollowing)
<div class="row pt-5 justify-content-center">
    @foreach ($posts as $post)

    <div class="col-md-3 d-flex pb-3 justify-content-center">

        <div class="card">
            <a href="/p/{{ $post->id }}">
                <img class="card-img-top" src="https://drinkster-images.s3-us-west-1.amazonaws.com/uploads/{{ $post->image }}" alt="Card image">
            </a>
            <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
              <p class="card-text">
                  <span><a href="/profile/{{ $post->user->profile->user_id }}"><strong><span class="text-dark pr-1">{{ $post->user->username }}</span></strong> </a>{{ $post->caption }}</span>
              </p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
 </div>
@else
    <div class="container w-100">
        <div class="jumbotron">
            <h1 class="display-4">It's Quiet In Here...</h1>
            <p class="lead">Seems you don't have any drinking buddies.</p>
            <hr class="my-4">
            <h5>Discover other Drinksters so you won't be lonely.</h5>
            <p class="lead pt-4">
              <a class="btn btn-primary btn-lg" href="/discover" role="button">Discover</a>
            </p>
          </div>
    </div>
@endif
@endsection
