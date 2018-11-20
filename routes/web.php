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
    return redirect('/disasters');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/disasters/testo', function () {
    return view('app.disasters.index');
});

Route::resource('/posts','PostsController');

Route::get('/refugees/testo', function () {
    return view('app.refugees.index');
});

// ====== Test =======

Route::resource('/test', 'TestController');
Route::resource('/disasters', 'DisastersController');

Route::get('/test/laporan', function () {
    return view('app.test.report');
});
Route::post('/test/report', function () {
    return ;
})->name('test.report');

// ======== Users =========
Route::resource('/users', 'UsersController');
