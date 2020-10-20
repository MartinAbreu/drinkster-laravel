@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-75">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3 ">
                    <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 75px">
                </div>
                <div class="d-flex align-items-center">
                    <div class="pr-4">
                        <h3><a href="/profile/{{ $post->user->profile->user_id }}"><span class="text-dark">{{ $post->user->username }}</span></a></h3>
                    </div>
                    <div>
                    @can('update', $post)
                        <a class="pl-1" href="/p/{{$post->id}}/edit"><strong>Edit</strong></a>
                    @endcan

                    </div>
                </div>
            </div>
            <hr>
            <div>
            <p><a href="/profile/{{ $post->user->profile->user_id }}"><strong><span class="text-dark pr-1">{{ $post->user->username }}</span></strong> </a>{{ $post->caption }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
