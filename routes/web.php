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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::prefix('vendas')->group(function(){
	Route::get('/', 'SalesController@index')->name('sales.home');
	Route::post('store', 'SalesController@store')->name('sales.store');
	Route::get('edit/{sale}','SalesController@edit')->name('sales.edit');
	Route::put('update', 'SalesController@update')->name('sales.update');
	Route::delete('delete/{id}', 'SalesController@delete')->name('sales.delete');
});

