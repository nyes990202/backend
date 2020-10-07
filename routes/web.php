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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\HomeController;

Route::get('/','FrontController@index');

Route::get('/news','FrontController@news');

Route::get('/news_info/{news_id}','FrontController@news_info');

Route::get('/contact_us','FrontController@contact_us');

Route::post('/store_contact','FrontController@store_contact');





Auth::routes(['register'=>false , 'reset'=>false]);

Route::get('/admin', 'HomeController@index')->name('home');
Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('news','NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store','NewsController@store');
    Route::get('news/edit/{news_id}', 'NewsController@edit');
    Route::post('news/update/{news_id}', 'NewsController@update');
    Route::get('news/destory/{news_id}', 'NewsController@destory');


});
