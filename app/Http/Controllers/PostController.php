<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        return view('admin.posts.form', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));

    }

    public function update(PostRequest $request, Post $post)
    {
        $post->updateAttributes($request->validated());
        flash()->success('Post updated');

        return back();
    }

    public function store(PostRequest $request)
    {
        $post = (new Post())->updateAttributes($request->validated());
        flash()->success('Post saved');

        return redirect()->action('PostsController@edit', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        flash()->success('The post was deleted');

        return back();
    }
}
