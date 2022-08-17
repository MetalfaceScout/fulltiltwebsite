<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('blog', function () { //find all posts and display them
    $posts = Post::all();
    return view('blog', [
        'posts' => $posts
    ]);
});

Route::get('shop', function () {
    return view('shop');
});

Route::get('about', function () {
    return view('about');
});

//Posts

Route::get('blog/{post}', function ($slug) {

    //Find a post by it's slug and display it
    $post = Post::find($slug);

    return $post;

})->whereAlphaNumeric('post');
