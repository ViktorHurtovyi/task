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
Route::get('/', function () {
    return redirect(route('login'));
});
Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', function (){
       \Auth::logout();
       return redirect(route('login'));
    })->name('logout');
    Route::get('/consumer', 'Consumer\consumerController@index')->name('consumer');
    Route::get('/consumerLogin', 'Consumer\consumerController@indexLogin')->name('consumerLogin');
    Route::get('/consumerEmail', 'Consumer\consumerController@indexEmail')->name('consumerEmail');
    Route::get('/consumerGroup', 'Consumer\consumerController@indexGroup')->name('consumerGroup');
    Route::get('/consumer/add', 'Consumer\consumerController@addConsumer')->name('consumer.add');
    Route::post('/consumer/add', 'Consumer\consumerController@addrequestConsumer');
    Route::get('/consumer/edit/{id}', 'Consumer\consumerController@editConsumer')->where('id', '\d+')
        ->name('consumer.edit');
    Route::post('/consumer/edit/{id}', 'Consumer\consumerController@editRequestConsumer')
        ->where('id', '\d+');
    Route::delete('/consumer/delete', 'Consumer\consumerController@deleteConsumer')->name('consumer.delete');
});
