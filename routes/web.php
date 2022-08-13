<?php

use Illuminate\Support\Facades\Route;

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

Route::get('blog', function () {
    return view('blog', [
        'posts' => 'Get post here?'
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
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (! file_exists($path)) {
        abort(404); //idiot
    }

    $post = file_get_contents($path);

    return $post;
})->whereAlphaNumeric('post');
