<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
Consider the example.md file from above. First you'll need to parse the contents:

use Spatie\YamlFrontMatter\YamlFrontMatter;
$object = YamlFrontMatter::parse(file_get_contents('example.md'));

The parser will return a YamlFrontMatterObject, which can be queried for front matter or it's body.

$object->matter(); // => ['title' => 'Example']
$object->matter('title'); // => 'Example'
$object->body(); // => 'Lorem ipsum.'
$object->title; // => 'Example'
*/



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

Route::get('blog', function () { //find all posts and display them, using yamlfrontmatter
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

    //Find a post by it's slug and pass it to the posts view
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);

})->whereAlphaNumeric('post');
