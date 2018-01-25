<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests\PostRequest;
use App\Models\Category;

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
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.form', compact('post'))->with(compact('categories'));
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.form', compact('post'))->with(compact('categories'));

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
