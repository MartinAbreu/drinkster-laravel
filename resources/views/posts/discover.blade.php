@extends('layouts.app')

@section('content')
<div class="container w-75">
   @foreach ($posts as $post)
   <div class="row w-100">
    <div class="col-6 offset-3 align-items-center pb-2 pt-2">
    <a href="/p/{{ $post->id }}"><img src="https://drinkster-images.s3-us-west-1.amazonaws.com/uploads/{{ $post->image }}" class="w-100"></a>
    </div>
    <div class="col-6 offset-3 pb-2">
        <div class="d-flex align-baseline">
            <div class="pr-2">
                <img src="https://drinkster-images.s3-us-west-1.amazonaws.com/profilePic/{{ $post->user->profile->image }}" class="w-100 rounded-circle" style="max-width: 15px">
            </div>
            <div>
                <span><a href="/profile/{{ $post->user->profile->user_id }}"><strong><span class="text-dark pr-1">{{ $post->user->username }}</span></strong> </a>{{ $post->caption }}</span>
            </div>
        </div>
        <hr/>
    </div>
</div>
   @endforeach
   <div class="row">
       <div class="col-12 d-flex justify-content-center">
           {{ $posts->links() }}
       </div>
   </div>
</div>
@endsection
