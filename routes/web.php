<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('home');
});*/

Route::get('/','AppController@index');
Route::get('/home','AppController@index')->name('home');
Route::get('/about','AppController@about')->name('about');
Route::get('/contact','AppController@contact')->name('contact');

Route::any('/add', 'AppController@addUser')->name('add');
Route::any('/delete/{user_id?}', 'AppController@deleteUser')->name('delete');
Route::any('/edit/{user_id?}', 'AppController@editUser')->name('edit');
Route::any('/edit_action/{user_id?}', 'AppController@editAction')->name('edit_action');











//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
?>

