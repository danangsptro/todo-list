<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('todo')->group(function () {
    Route::get('/', 'todoListController@index');
    Route::get('/create/{id?}', 'todoListController@create');
    Route::post('/store-todolist/{id?}', 'todoListController@store');
    Route::get('/delete/{id}', 'todoListController@delete');
});
