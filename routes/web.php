<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/person', 'PersonController@index')->name('person');
Route::get('/person/add', 'PersonController@add');
Route::post('person/new', 'PersonController@new');
Route::get('/person/edit/{id}', 'PersonController@edit');
Route::put('/person/update/{id}', 'PersonController@update');
Route::get('/person/delete/{id}', 'PersonController@delete');
