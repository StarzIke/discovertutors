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

//facebookApp
Route::get('login/facebook', 'Auth\RegisterController@redirectToFacebook'); 
Route::get('login/facebook/callback', 'Auth\RegisterController@getFacebookCallback');


Route::get('index', 'TestController@index');
Route::get('pages/dashboard', 'DashboardController@index');
Route::get('pages/dashmessage', 'DashboardController@message')->name('message');
Route::get('pages/dashprofile', 'DashboardController@profile')->name('profile');
Route::post('pages/dashprofile', 'DashboardController@storeprofile')->name('storeprofile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'AdminController@admin')->name('admin')->middleware('admin');
Route::get('/logout', 'AdminController@logout');

//Tutor
Route::get('tutor/compose', 'TutorController@compose')->name('compose');
Route::post('tutor/compose', 'TutorController@store')->name('store');