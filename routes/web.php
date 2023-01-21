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
    return view('welcome');
});

//product list page
Route::get('/product', 'App\Http\Controllers\ProductController@index');


//create product
//point to create() method in ProductController
//create returns product/create.blade.php

Route::get('/product/create', 'App\Http\Controllers\ProductController@create');


// Route::get('/product/{id}/edit', 'App\Http\Controllers\ProductController@edit');
Route::middleware(['web'])->get('product/{id}/edit', 'App\Http\Controllers\ProductController@edit');

//data from form to database
Route::post('/product/createProduct', 'App\Http\Controllers\ProductController@store');

//destroy
//Route::delete('/product/{id}', 'App\Http\Controllers\ProductController@destroy');

Route::middleware(['web'])->delete('product/{id}', 'App\Http\Controllers\ProductController@destroy');

Route::middleware(['web'])->put('product/{id}', 'App\Http\Controllers\ProductController@update')->name('product.update');

// Route::post('product/update', 'App\Http\Controllers\ProductController@update');