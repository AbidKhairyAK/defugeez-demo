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

// Init
Route::get('/', function () {
    return redirect('/events');
});

// Events
Route::resource('/events', 'EventsController');
Route::prefix('/events/{event}')->group(function(){
	// Posts
	Route::resource('/posts', 'PostsController');
	Route::prefix('/posts/{post}')->group(function(){
		// Refugees
		Route::post('/refugees/import', 'RefugeesController@import')->name('refugees.import');
		Route::get('/refugees/export', 'RefugeesController@export')->name('refugees.export');
		Route::get('/refugees/format', 'RefugeesController@format')->name('refugees.format');
		Route::resource('/refugees', 'RefugeesController');
		// Demand
		Route::resource('/demands', 'DemandsController');
	});
});

// Organizations
Route::resource('/organizations', 'OrganizationsController');
Route::prefix('/organizations/{organization}')->group(function(){
	// Users
	Route::resource('/users', 'UsersController');
});

// Donations
Route::get('/transfers', 'TransfersController@index')->name('transfers.index');
Route::resource('/donations', 'DonationsController');
Route::prefix('/donations/{donation}')->group(function(){
	// Transfer
	Route::prefix('/transfers/{transfer}')->group(function(){
		// Proofs
		Route::delete('/delete', 'TransfersController@delete')->name('transfers.delete');
		Route::get('/proofs/create', 'TransfersController@proof_create')->name('proofs.create');
		Route::post('/proofs/store', 'TransfersController@proof_store')->name('proofs.store');
	});
	Route::resource('/transfers', 'TransfersController')->except(['index']);
});

// Auth
Route::get('/login', 'AuthController@loginForm')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@registerForm')->name('register');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/organization-register', 'AuthController@organizationRegisterForm')->name('organization-register');
Route::post('/organization-register', 'AuthController@organizationRegister')->name('organization-register');
Route::post('/logout', 'AuthController@logout')->name('logout');

// Location
Route::get('/location/province', 'LocationController@province');
Route::get('/location/regency', 'LocationController@regency');
Route::get('/location/district', 'LocationController@district');
Route::get('/location/village', 'LocationController@village');

// Search
Route::get('/search', 'ListsController@search')->name('search');

// Lists
Route::prefix('list')->group(function(){
	Route::get('events', 'ListsController@eventsList')->name('events.list');
	Route::get('posts/{event?}', 'ListsController@postsList')->name('posts.list');
	Route::get('refugees', 'ListsController@refugeesList')->name('refugees.list');
	Route::get('donations', 'ListsController@donationsList')->name('donations.list');
});

// Route::get('/message', 'UsersController@message');
