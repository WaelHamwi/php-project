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


Route::resource('/', 'HomeController');

Route::get('contact', 'HomeController@contactUsView');

Route::get('login', function () {
    return view('login');
});

Route::post('contactUs', 'HomeController@sendEmail');
//Route::post('contactUs', function () {
////    return view('contact');
//    dd('aaa');
//});
Route::get('messages','HomeController@messages');
Route::post('/main/checklogin', 'HomeController@checklogin');
Route::get('addHouse', 'HomeController@addHousePage');

Route::get('logout', 'HomeController@logout');
//Auth::routes();
Route::post('saveHouse', 'HomeController@saveHouse');
Route::get('allHouses','HomeController@allHouses');
Route::get('/search' , 'HomeController@search')->name('search');
Route::get('viewHouse/{house_id}','HomeController@viewHouse');


Route::post('buy', 'HomeController@buy');
