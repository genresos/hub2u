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


Route::get('/')->name('home.index')->uses('HomeController@index');

Route::get('/yajra')->name('yajra.index')->uses('ProductController@datatablesIndex');


//============ Products Route
Route::prefix('products')->group(function () {
    Route::get('/', 'ProductController@index')->name('product-index');
    Route::post('/', 'ProductController@store')->name('product-store');
    Route::get('/delete{id}', 'ProductController@delete')->name('product-delete');
    Route::get('/edit{id}', 'ProductController@edit')->name('product-edit');
    Route::post('/update{id}', 'ProductController@update')->name('product-update');
});

Route::prefix('purchase')->group(function (){
    Route::get('/', 'PurchaseController@index')->name('purchase-index');
    Route::get('/item', 'PurchaseController@item')->name('purchase-item');
    Route::post('/', 'PurchaseController@store')->name('purchase-store');
    Route::get('/delete{id}', 'PurchaseController@delete')->name('purchase-delete');
    Route::get('/update', 'PurchaseController@update')->name('purchase-update');
});
Route::prefix('sell')->group(function (){
    Route::get('/', 'SellController@index')->name('sell-index');
    Route::get('/item', 'SellController@item')->name('sell-item');
    Route::post('/', 'SellController@store')->name('sell-store');
    Route::get('/delete{id}', 'SellController@delete')->name('sell-delete');
    Route::get('/update', 'SellController@update')->name('sell-update');
});


Route::get('/productcreate', 'ProductController@create')->name('product-create');
Route::get('/producttrace', 'ProductController@trace')->name('product-trace');
Route::get('/laporan', 'LaporanController@index')->name('laporan-index');
Route::get('/laporan/item', 'LaporanController@item')->name('laporan-item');
Route::get('/outcoming', 'LaporanController@outcoming')->name('laporan-outcoming');

Route::get('/budgeting', 'BudgetingController@index')->name('budgeting-index');
Route::post('/budgeting', 'BudgetingController@store')->name('budgeting-store');
Route::post('/budgetingitem', 'BudgetingController@item')->name('budgeting-item');
Route::get('/budgetingprint', 'BudgetingController@print')->name('budgeting-print');
Route::get('/test', 'BudgetingController@test')->name('budgeting-test');


// Auth::routes();


