<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('mail', function()
{
    dd(Config::get('mail'));
});

Route::get('/home', 'HomeController@index');

Route::get('/shows', 'ShowsController@store');

Route::get('/autocomplete', array('as' => 'autocomplete', 'uses' => 'ShowsController@autocomplete'));

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/test', function () {
    return  date('U',strtotime('2016-10-19T20:00:00-04:00'));
    // return  iconv( "UTF-8", "ISO-8859-1", "Στο παρά 5");
    // return mb_convert_encoding ("Στο παρά 5", 'US-ASCII', 'UTF-8');
});