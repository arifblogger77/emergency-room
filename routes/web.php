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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route person
Route::get('/person', 'PersonController@index')->name('person');
Route::get('/person/add', 'PersonController@add')->name('person.add');
Route::post('person/new', 'PersonController@new')->name('person.new');
Route::get('/person/edit/{id}', 'PersonController@edit')->name('person.edit');
Route::put('/person/update/{id}', 'PersonController@update')->name('person.update');
Route::get('/person/delete/{id}', 'PersonController@delete')->name('person.delete');

//route bed
Route::get('/bed', 'BedController@index')->name('bed');
Route::get('/bed/add', 'BedController@add')->name('bed.add');
Route::post('bed/new', 'BedController@new')->name('bed.new');
Route::get('/bed/delete/{id}', 'BedController@delete')->name('bed.delete');

//route shift
Route::get('/shift', 'ShiftController@index')->name('shift');
Route::get('/shift/add', 'ShiftController@add')->name('shift.add');
Route::post('shift/new', 'ShiftController@new')->name('shift.new');
Route::get('/shift/edit/{id}', 'ShiftController@edit')->name('shift.edit');
Route::put('/shift/update/{id}', 'ShiftController@update')->name('shift.update');
Route::get('/shift/delete/{id}', 'ShiftController@delete')->name('shift.delete');
