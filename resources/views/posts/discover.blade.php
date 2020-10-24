@extends('layouts.app')

@section('content')
<div class="row pt-5 justify-content-center">
    @foreach ($posts as $post)
        <div class="col-md-3 d-flex pb-3 justify-content-center">

            <a href="/p/{{ $post->id }}">
            <div class="card">
                    <img class="card-img-top" src="https://drinkster-images.s3-us-west-1.amazonaws.com/uploads/{{ $post->image }}" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $post->title }}</h5>
                        <p class="card-text">
                            <span><a href="/profile/{{ $post->user->profile->user_id }}"><strong><span class="text-dark pr-1">{{ $post->user->username }}</span></strong> </a>{{ $post->caption }}</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
   <div class="row">
       <div class="col-12 d-flex justify-content-center">
           {{ $posts->links() }}
       </div>
   </div>
</div>
@endsection
