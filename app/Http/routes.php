<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Homepage
Route::get('/', 'WelcomeController@index');

// About page
Route::get('about', 'AboutController@index');

// Blog
Route::get('search', ['as' => 'search', 'uses' => 'BlogsController@search']);
Route::resource('blog', 'BlogsController');
Route::get('tags/{tags}', 'TagsController@show');

// Personal Projects
Route::resource('projects', 'ProjectsController');

// Contact page
Route::resource('contact', 'ContactController');
Route::post('contact_request', 'ContactController@submit');

// Page editing
Route::resource('pages', 'PageController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
