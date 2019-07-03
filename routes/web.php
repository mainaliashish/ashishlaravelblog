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

Route::get('/', 'FrontEndController@blog')->name('blog');
Route::get('/blog', 'FrontEndController@blog')->name('blog.index');
Route::get('/post/{slug}', 'FrontEndController@singlepost')->name('posts.single');
Route::get('/category/{slug}', 'FrontEndController@category')->name('categories.single');
Route::get('/tag/{slug}', 'FrontEndController@tag')->name('tags.single');
Route::get('/results', function(){
		$posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
		return  view('results')->with('posts', $posts)
		            ->with('title', 'Search results for : ' . request('query'))
                    ->with('settings', \App\Setting::first())
                    ->with('categories', \App\Category::take('5')->get())
                    ->with('tags', \App\Tag::all())
                    ->with('query', request('query'));
}) ->  name('results');

Route::post('/subscribe', function(){

	$email = request('email');

	Newsletter::subscribe($email);

	Session::flash('subscribe', 'You have successfully subscribed!');
	return redirect() -> back();

}) -> name('subscribe');


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

Route::get('/dashboard', 'HomeController@index')-> name('dashboard');
/* Post Routes */
Route::get('/posts', 'PostsController@index') -> name('posts');
Route::get('/posts/create', 'PostsController@create') -> name('posts.create');
Route::get('/posts/edit/{slug}', 'PostsController@edit') -> name('posts.edit');
Route::patch('/posts/update/{slug}', 'PostsController@update') -> name('posts.update');
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
Route::get('/settings', 'SettingsController@index') -> name('settings') -> middleware('admin');
Route::post('/settings/update', 'SettingsController@update') -> name('settings.update') -> middleware('admin');
});