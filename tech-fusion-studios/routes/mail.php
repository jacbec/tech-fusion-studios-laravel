<?php

/*
|--------------------------------------------------------------------------
| Mail Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['domain' => 'techfusionstudios.com'], function () {
    Route::post('/emails/contact', 'EmailsController@contact')->name('emails.contact');
});

Route::group(['domain' => 'mail.techfusionstudios.com'], function (){
    Route::group(['namespace' => 'Mail'], function () {
    });
});