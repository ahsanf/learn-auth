<?php

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
    return redirect()->route('posts.index');
});

Route::get('/home', function () {
    return redirect()->route('posts.index');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
Route::resource('users.posts', 'User\PostController');

Route::resource('users', 'UserController', [
    'only' => [ 'index', 'show', 'edit', 'update', 'destroy' ],
    'middleware' => [ 'auth' ]
]);
Route::resource('posts', 'PostController', [
    'only' => [ 'index' ],
    'middleware' => [ 'auth' ]
]);
Route::resource('users.posts', 'User\PostController', [
    'only' => [ 'create', 'store', 'edit', 'update', 'destroy' ],
    'middleware' => [ 'auth' ]
]);


