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

/* @var \Illuminate\Routing\Router $router */
$router->get('/', 'StatusController@index');

/*
|--------------------------------------------------------------------------
| Users Resource
|--------------------------------------------------------------------------
*/

$router->get('/users/{id}', 'UserController@show');
$router->post('/users/{user}/addresses', 'AddressesController@store');
$router->post('/users/{user}/phones', 'PhonesController@store');

/*
|--------------------------------------------------------------------------
| Books Resource
|--------------------------------------------------------------------------
*/

$router->get('/books', 'BookController@index');
$router->get('/books/create', 'BookController@create');
$router->post('/books', 'BookController@store');
$router->get('/books/{id}', 'BookController@show');
$router->get('/books/{id}/edit', 'BookController@edit');
$router->put('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@delete');

/*
|--------------------------------------------------------------------------
| Authors Resource
|--------------------------------------------------------------------------
*/

$router->get('/authors', 'AuthorController@index');
$router->get('/authors/create', 'AuthorController@create');
$router->post('/authors', 'AuthorController@store');
$router->get('/authors/{id}', 'AuthorController@show');
$router->get('/authors/{id}/edit', 'AuthorController@edit');
$router->put('/authors/{id}', 'AuthorController@update');
$router->delete('/authors/{id}', 'AuthorController@delete');

/*
|--------------------------------------------------------------------------
| User Autentication
|--------------------------------------------------------------------------
*/

$router->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$router->post('/login', 'Auth\LoginController@login');
$router->post('/logout', 'Auth\LoginController@logout')->name('logout');
$router->post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$router->get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$router->post('/password/reset', 'Auth\ResetPasswordController@reset');
$router->get('/password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');
$router->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$router->post('/register', 'Auth\RegisterController@register');

$router->get('/home', 'HomeController@index')->name('home');
