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

// Auth routes
Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
    'confirm'  => false,
]);

Route::get('/', 'MainController@index')->name('main');

// Office routes
Route::group(['prefix' => 'office', 'as' => 'office.'], function ($route) {
    $route->get('list', 'OfficeController@list')->name('list');
    $route->get('edit/{id}', 'OfficeController@edit')->name('edit');
    $route->post('create', 'OfficeController@create')->name('create')
        ->middleware(['ajax']);
    $route->put('update/{office}', 'OfficeController@update')->name('update')
        ->middleware(['ajax']);
});

// Countries
Route::group(['prefix' => 'country', 'as' => 'country.'], function ($route) {
    $route->get('list', 'CountryController@list')->name('list')->middleware(['ajax']);
});

