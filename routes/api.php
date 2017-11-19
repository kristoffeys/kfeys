<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', function () {
    return App\Post::where('status', '=', 'PUBLISHED')->get();
});

Route::get('/posts/{slug}', function($slug) {
    return App\Post::whereRaw('slug = ? AND status = "PUBLISHED"', [$slug])->firstOrFail();
});

Route::get('/pages/{slug}', function($slug) {
    return App\Page::whereRaw('slug = ? AND status = "ACTIVE"', [$slug])->firstOrFail();
});

Route::get('/categories/{slug}', function($slug) {
    return App\Category::whereRaw('slug = ?', [$slug])->with('posts')->firstOrFail();
});

Route::get('/navigation', function() {
    $pages = collect(App\Page::whereRaw('status = "ACTIVE"')->get(['title',DB::raw("CONCAT('/',slug) AS slug")]));
    $categories = collect(App\Category::select(DB::raw("CONCAT('/category/', slug) AS slug"),DB::raw('name AS title'))->get());
    return $pages->merge($categories);
});
