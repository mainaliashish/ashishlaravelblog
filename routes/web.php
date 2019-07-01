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
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

Route::get('/home', 'HomeController@index')-> name('home');
/* Post Routes */
Route::get('/posts', 'PostsController@index') -> name('posts');
Route::get('/posts/create', 'PostsController@create') -> name('posts.create');
Route::get('/posts/edit/{id}', 'PostsController@edit') -> name('posts.edit');
Route::patch('/posts/update/{id}', 'PostsController@update') -> name('posts.update');
Route::get('/posts/delete/{id}', 'PostsController@destroy') -> name('posts.delete');
Route::get('/posts/restore/{id}', 'PostsController@restore') -> name('posts.restore');
Route::get('/posts/trashed', 'PostsController@trashed') -> name('posts.trashed');
Route::get('/posts/kill/{id}', 'PostsController@kill') -> name('posts.kill');
Route::post('/posts/store', 'PostsController@store')  -> name('posts.store');

/* Categories Routes */

Route::get('/categories', 'CategoriesController@index') -> name('categories');
Route::get('/categories/create', 'CategoriesController@create') -> name('categories.create');
Route::post('/categories/store', 'CategoriesController@store') -> name('categories.store');
Route::get('/categories/edit/{id}', 'CategoriesController@edit') -> name('categories.edit');
Route::patch('/categories/update/{id}', 'CategoriesController@update') -> name('categories.update');
Route::get('/categories/delete/{id}', 'CategoriesController@destroy') -> name('categories.delete');

/* Tags Routes */

Route::get('/tags', 'TagsController@index') -> name('tags');
Route::get('/tags/create', 'TagsController@create') -> name('tags.create');
Route::post('/tags/store', 'TagsController@store') -> name('tags.store');
Route::get('/tags/edit/{id}', 'TagsController@edit') -> name('tags.edit');
Route::patch('/tags/update/{id}', 'TagsController@update') -> name('tags.update');
Route::get('/tags/delete/{id}', 'TagsController@destroy') -> name('tags.delete');

/* Users Routes */

Route::get('/users', 'UsersController@index') -> name('users');
Route::get('/users/create', 'UsersController@create') -> name('users.create');
Route::get('/users/admin/{id}', 'UsersController@admin') -> name('users.admin');
Route::get('/users/not_admin/{id}', 'UsersController@not_admin') -> name('users.not.admin');
Route::post('/users/store', 'UsersController@store') -> name('users.store');
Route::get('/users/edit/{id}', 'UsersController@edit') -> name('users.edit');
Route::patch('/users/update/{id}', 'UsersController@update') -> name('users.update');
Route::get('/users/delete/{id}', 'UsersController@destroy') -> name('users.delete');
Route::get('/users/profile', 'ProfilesController@profile') -> name('users.profile');

Route::patch('/users/profile/update', 'ProfilesController@update') -> name('users.profile.update');
});