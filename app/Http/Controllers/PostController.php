<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image as Image;

use App\Models\Post as Post;

use App\Models\User as User;


class PostController extends Controller
{
    //prevent user from reaching this page without auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //validate data before creating
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //create data by auth user
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(\App\models\Post $post, User $user)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(\App\Models\Post $post, User $user)
    {
        $this->authorize('update', $post);
        $data = request()->validate([
            'caption' => 'required',
        ]);

        Post::find($post->id)->update($data);

        return redirect("/p/{$post->id}");
    }

    public function destroy(\App\Models\Post $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('/');
    }
}
