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



//'register'=>false ,

Auth::routes([ 'reset'=>false]);

Route::get('/admin', 'HomeController@index')->name('home');
Route::prefix('admin')->middleware(['auth'])->group(function(){
    //消息管理
    Route::get('news','NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store','NewsController@store');
    Route::get('news/edit/{news_id}', 'NewsController@edit');
    Route::post('news/update/{news_id}', 'NewsController@update');
    Route::get('news/destroy/{news_id}', 'NewsController@destroy');

    //測試管理
    Route::get('test','TestController@index');
    Route::get('test/create', 'TestController@create');
    Route::post('test/store','TestController@store');
    Route::get('test/edit/{test_id}', 'TestController@edit');
    Route::post('test/update/{test_id}', 'TestController@update');
    Route::get('test/destroy/{test_id}', 'TestController@destroy');

    //商品管理
    Route::get('product','ProductController@index');
    Route::get('product/create', 'ProductController@create');
    Route::post('product/store','ProductController@store');
    Route::get('product/edit/{product_id}', 'ProductController@edit');
    Route::post('product/update/{product_id}', 'ProductController@update');
    Route::get('product/destroy/{product_id}', 'ProductController@destroy');


});
