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
    return redirect('/page/events');
});

Route::prefix('page')->group(function(){
	Route::get('organizations', 'OrganizationsController@page')->name('organizations.page');
	Route::get('events', 'EventsController@page')->name('events.page');
	Route::get('posts/{id}', 'PostsController@page')->name('posts.page');
	Route::get('refugees/{id}', 'RefugeesController@page')->name('refugees.page');
	Route::get('users/{id}', 'UsersController@page')->name('users.page');
});

Route::get('/donations/form', function() {
  return view('donations.form');
})->name('donations.form');

Route::get('/donations/payment', function() {
  return view('donations.payment');
})->name('donations.payment');

Route::get('/donations/summary', function() {
  return view('donations.summary');
})->name('donations.summary');

Route::get('/register', function() {
  return view('auth.register');
});

Route::get('/plagin', function() {
        Toastr::success('Oladag','skeit park inc');
	return view('plagin');
});

Route::get('/form', function(){
	$test = '';
	return view('refugees.create', compact('test'));
});

Route::resource('/organizations', 'OrganizationsController');
Route::resource('/users', 'UsersController');
Route::resource('/events', 'EventsController');
Route::resource('/refugees', 'RefugeesController');
Route::resource('/posts', 'PostsController');
Route::resource('/demands', 'DemandsController');

Route::get('/donations', function() {
	return view('donations.detail');
})->name('donations');

Route::get('/message', 'UsersController@message');

// Auth
Route::get('login', 'UsersController@loginForm')->name('login');
Route::post('login', 'UsersController@login')->name('login');
Route::get('register', 'UsersController@registerForm')->name('register');
Route::post('register', 'UsersController@register')->name('register');
Route::post('logout', 'UsersController@logout')->name('logout');

// ajax request only
Route::get('/location/province', 'LocationController@province');
Route::get('/location/regency', 'LocationController@regency');
Route::get('/location/district', 'LocationController@district');
Route::get('/location/village', 'LocationController@village');

Route::get('search', 'ListsController@search')->name('search');

Route::prefix('list')->group(function(){
	Route::get('events', 'ListsController@eventsList')->name('events.list');
	Route::get('posts/{id?}', 'ListsController@postsList')->name('posts.list');
	Route::get('refugees/{id?}', 'ListsController@refugeesList')->name('refugees.list');
});