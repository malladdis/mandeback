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

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
{
    // implement your reset password route here!
}]);

Route::get('/', function () {
    return Redirect::to('http://localhost:4200');
});


Route::resource('migration]s', 'migration]Controller');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
