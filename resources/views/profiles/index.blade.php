@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
    <div class="col-3 pt-3 pl-5 d-flex align-items-center justify-content-center "><img class="rounded-circle" src="{{ $user->profile->profileImage()}}" style="max-height: 175px"></div>
        <div class="col-7 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <div class="h4 mb-0">{{ $user->username }}</div>

                @cannot('update', $user->profile)
                <follow-button user-id='{{ $user->id }}' follows="{{ $follows }}"></follow-button>
                @endcannot
                </div>

                @can('create', $user->profile)
                    <a href="/p/create"><strong>Add New Post</strong></a>
                @endcan
            </div>

        @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit"><strong>Edit Profile</strong></a>
        @endcan

            <div class="d-flex pt-4">
            <div class="pr-3"><strong>{{ $postCount }}</strong> posts</div>
            <div class="pr-3"><strong>{{ $followersCount }}</strong> followers</div>
            <div class="pr-3"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-2">
                <div><strong>{{ $user->profile->title }}</strong></div>
                <div><span>{{ $user->profile->description }}</span></div>
            <div><strong><a href="{{ $user->profile->url }}" target="_blank" >{{ $user->profile->url ?? ' ' }}</a></strong></div>
            </div>

        </div>
    </div>
    <hr class="w-75"/>
    <div class="row pt-5">
        @foreach ($user->posts as $post)

        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" />
            </a>
            <div class="d-flex align-baseline pt-3">
                <div class="pr-2">
                    <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 15px">
                </div>
                <div>
                    <span><a href="/profile/{{ $post->user->profile->user_id }}"><strong><span class="text-dark pr-1">{{ $post->user->username }}</span></strong> </a>{{ $post->caption }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
