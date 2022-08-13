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

// -> is basically just a dot in python, php is the worst as per usual
// :: is static method access, Route is a class and get is a static public method of Route. Extremely homosexual syntax

Route::get('/', function () {
    return view('index');
});


/*
Route::get('contact' function () {
    return view('contact');
});
*/
