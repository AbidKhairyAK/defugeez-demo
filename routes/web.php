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

Route::resource('/organizations', 'OrganizationsController');
Route::resource('/users', 'UsersController');
Route::resource('/events', 'EventsController');
Route::resource('/refugees', 'RefugeesController');
Route::resource('/posts', 'PostsController');
Route::resource('/demands', 'DemandsController');

// Auth
Route::get('login', 'AuthController@loginForm')->name('login');
Route::post('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@registerForm')->name('register');
Route::post('register', 'AuthController@register')->name('register');
Route::get('organization-register', 'AuthController@organizationRegisterForm')->name('organization-register');
Route::post('organization-register', 'AuthController@organizationRegister')->name('organization-register');
Route::post('logout', 'AuthController@logout')->name('logout');

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

// Donations

Route::get('/donations/form', function() {
  return view('donations.form');
})->name('donations.form');

Route::get('/donations/payment', function() {
  return view('donations.payment');
})->name('donations.payment');

Route::get('/donations/summary', function() {
  return view('donations.summary');
})->name('donations.summary');

Route::get('/donations', function() {
	return view('donations.detail');
})->name('donations');

// Route::get('/message', 'UsersController@message');

Route::post('refugees/{post_id}/import', 'RefugeesController@import')->name('refugees.import');
Route::get('refugees/{post_id}/export', 'RefugeesController@export')->name('refugees.export');
Route::get('refugees/{post_id}/format', 'RefugeesController@format')->name('refugees.format');