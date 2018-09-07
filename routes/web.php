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

$router->get('/authors', 'AuthorsController@index');
$router->get('/authors/create', 'AuthorsController@create');
$router->post('/authors', 'AuthorsController@store');
$router->get('/authors/{id}', 'AuthorsController@show');
$router->get('/authors/{id}/edit', 'AuthorsController@edit');
$router->put('/authors/{id}', 'AuthorsController@update');
$router->delete('/authors/{id}', 'AuthorsController@delete');

/*
|--------------------------------------------------------------------------
| User Autentication
|--------------------------------------------------------------------------
*/

Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');
