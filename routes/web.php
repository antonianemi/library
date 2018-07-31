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
