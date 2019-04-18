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


Route::get('/hello', function () {

    return "<h1>hi</h1>";
});

//dynamic route
Route::get('/users/{id}/{name}', function ($id,$name) {
    return 'This is user: '.$id. ' Name: '.$name;

});

//load view directly for about:
/*
Route::get('/about', function () {
    return view('pages/about');
});
*/
//for the about function in the PagesController - to do the above but through controller
Route::get('/about', 'PagesController@about');

//for the index function in the PagesController
Route::get('/', 'PagesController@index');

Route::get('/services', 'PagesController@services');

//For the functions in the PostsController
Route::resource('posts','PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
