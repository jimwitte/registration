<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'WelcomeController@welcome');

    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    
    Route::get('/profile/register', 'ProfileController@register')->name('profile.register');
    Route::post('/profile/register', 'ProfileController@registerUpdate')->name('profile.registerUpdate');
    Route::delete('/profile/register/delete', 'ProfileController@registerDestroy')->name('profile.registerDestroy');
    Route::post('/profile/email','ProfileController@sendEmailProfile')->name('profile.sendEmailProfile');
    Route::auth();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::resource('session', 'SessionController');

    Route::get('/registration/{id}','RegistrationController@edit')->name('registration.edit');
    Route::post('/registration/{id}','RegistrationController@update')->name('registration.update');

    Route::get('/setting/{id}','SettingController@edit')->name('setting.edit');
    Route::patch('/setting/{id}','SettingController@update')->name('setting.update');
    Route::get('/setting','SettingController@index')->name('setting.index');

});
