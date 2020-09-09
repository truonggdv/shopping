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

Route::group(['namespace' => 'Frontend'], function() {
    Route::resource('/','IndexController');
    Route::post('lien-he','IndexController@sendMail');
    Route::get('san-pham/{slug}', 'IndexController@getProduct');
    Route::group(['prefix'=>'thong-tin'],function (){
        Route::get('lich-su','IndexController@getlichsu');
        Route::get('thanh-tuu','IndexController@getthanhtuu');
        Route::get('tam-nhin','IndexController@gettamnhin');
        Route::get('su-menh','IndexController@getsumenh');
    });
    Route::get('lien-he','IndexController@getlienhe');
    Route::group(['prefix'=>'cart'],function (){
        Route::get('add/{id}','CartController@getAddCart');
        Route::get('show','CartController@getShow');
        Route::get('delete/{id}','CartController@getDelete');
        Route::get('update','CartController@getUpdate');
        Route::get('checkout','CartController@getCheckout');
        Route::post('checkout','CartController@postCheckout');
        Route::get('succsess','CartController@getSusscess');
    });
});
//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify' => true]);
Route::group(['prefix'=>'admin','namespace' => 'Backend'], function() {
    Route::group(['middleware' => 'auth'],function(){
    Route::resource('dashboard','DashboardController');
    Route::resource('background','BackgroundController');
    Route::resource('banner', 'BannerController');
    Route::resource('categories','CategoriesController');
    Route::resource('introduce','IntroduceController');
    Route::resource('product','ProductController');
    Route::resource('user','UserController');
    Route::resource('permission','PermissionController');
    Route::resource('role','RoleController');
    Route::resource('feedback','FeedbackController')->only('index','destroy');
    Route::resource('pay','PayController');
    Route::resource('chart','ChartController')->only('index');
    });
});
