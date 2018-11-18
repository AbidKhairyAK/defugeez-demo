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

Route::get('/disasters', function () {
    return view('app.disasters.index');
});

Route::get('/posts', function () {
    return view('app.posts.index');
});

Route::get('/refugees', function () {
    return view('app.refugees.index');
});

// ====== Test =======
Route::get('/test/create', function () {
    return view('app.test.create');
});
Route::get('/test/edit', function () {
    return view('app.test.edit');
});
Route::get('/test/store', function () {
    return ;
})->name('test.store');
Route::get('/test/update', function () {
    return ;
})->name('test.update');
