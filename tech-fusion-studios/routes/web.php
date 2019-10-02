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

Route::group(['domain' => 'techfusionstudios.com'], function ()
{
    Route::get('/', function () { return view('layouts.main'); })->name('home');

    Route::get('/', 'ServicesController@services')->name('home');

    Route::get('/services', 'ServicesController@services')->name('services');

    Route::get('/services/web', 'ServicesController@web')->name('services.web');

    Route::get('/services/app', 'ServicesController@app')->name('services.app');

    Route::get('/services/pc', 'ServicesController@pc')->name('services.pc');

    Route::get('/services/serverhosting', 'ServicesController@serverhosting')->name('services.serverhosting');

    Route::get('/services/networking', 'ServicesController@networking')->name('services.networking');

    Route::get('/services/ethicalhacking', 'ServicesController@ethicalhacking')->name('services.ethicalhacking');


    Route::get('/about/us', 'AboutController@us')->name('about.us');

    Route::get('/about/team', 'AboutController@team')->name('about.team');


    Route::group(['middleware' => ['roles'], 'roles' => ['Newbie', 'User', 'Superuser', 'Moderator', 'Staff']], function () {
        Route::get('/profile', function () { return view('layouts.profile'); })->name('profile');

        Route::get('/profile', 'ProfileController@data')->name('profile');

        Route::get('/profile/data', 'ProfileController@data')->name('profile.data');

        Route::get('/profile/users', 'ProfileController@users')->name('profile.users');

        Route::get('/profile/stream', 'ProfileController@stream')->name('profile.stream');

        Route::get('/profile/user', 'ProfileController@user')->name('profile.user');

        Route::post('/profile/avatar', 'ProfileController@avatar')->name('profile.avatar');
    });

    Route::get('/forums', function () { return view('layouts.forums'); })->name('forums');


    Route::get('/store', function () { return view('layouts.store'); })->name('store');


    Route::group(['middleware' => ['roles'], 'roles' => ['Staff']], function () {
        Route::get('/mail', function () { return view('layouts.mail'); })->name('mail');

        Route::get('/mail', 'MailController@inbox')->name('mail');

        Route::get('/mail/compose', 'MailController@compose')->name('mail.compose');

        Route::get('/mail/inbox', 'MailController@inbox')->name('mail.inbox');

        Route::get('/mail/sentmail', 'MailController@sentmail')->name('mail.sentmail');

        Route::get('/mail/drafts', 'MailController@drafts')->name('mail.drafts');

        Route::get('/mail/addresses', 'MailController@addresses')->name('mail.addresses');

        Route::get('/mail/folders', 'MailController@folders')->name('mail.folders');

        Route::get('/mail/spam', 'MailController@spam')->name('mail.spam');

        Route::get('/mail/trash', 'MailController@trash')->name('mail.trash');

        Route::get('/mail/settings', 'MailController@settings')->name('mail.settings');
    });


    Route::post('/user/login', 'Auth\LoginController@login')->name('user.login');

    Route::post('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

    Route::post('/user/register', 'Auth\RegisterController@register')->name('user.register');

    Route::post('/user/forgot', 'Auth\ForgotPasswordController@reset')->name('user.forgot');

    Route::post('/user/reset', 'Auth\ResetPasswordController@reset')->name('user.reset');
});