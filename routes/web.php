<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'LandingPageController@index')->name('landing_page');
Route::get('/store-phone', 'LandingPageController@storePhone')->name('landing.store.phone');

Route::prefix('admin')->group(function() {
    Route::namespace('AdminAuth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        Route::get('logout', 'LoginController@logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'RegisterController@register');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/config', 'ConfigController@index')->name('admin.config');
        Route::post('/config/update', 'ConfigController@update')->name('admin.config.update');

        Route::resource('teachers','TeacherController');
        Route::resource('phones','PhoneController');
        Route::resource('questions','QuestionController');
        Route::resource('answers','AnswerController');
        Route::resource('users','UserController');
    });

});

$this->get('logout', 'Auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
