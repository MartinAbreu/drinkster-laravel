<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Cache as Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers' . $user->id, now()->addSeconds(30), function () use ($user) {
            return count($user->profile->followers);
        });

        $followingCount = Cache::remember('count.following' . $user->id, now()->addSeconds(30), function () use ($user) {
            return count($user->following);
        });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(\App\Models\User $user, Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);

        if (request('image')) {
            $file = $request->file('image');

            $imageName = uniqid(date('YmdHis')) . '.' . $file->getClientOriginalName();

            $img = Image::make($file);

            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $resource = $img->stream()->detach();

            $storagePath = Storage::disk('s3')->put(
                'profilePic/' . $imageName,
                $resource,
                'public'
            );

            $imageArray = ['image' => $imageName];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }
}
