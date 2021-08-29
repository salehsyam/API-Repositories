<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth'], function () {
    Route::post('Register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');
});


Route::group(['prefix' => 'user', 'middleware' => ['auth:api']], function () {
    Route::get('show/information', 'UsersController@ShowMyDetails');
});

Route::group(['prefix' => 'admin'], function () {


    Route::get('showalluser', 'UsersController@index');
    Route::get('showallproduct', 'ProductController@index');
    Route::get('/details', 'UsersController@getDetailsAdmins');
    Route::get('/showuserby/{id}', 'UsersController@show');
    Route::delete('/destroyuserby/{id}', 'UsersController@destroy');
    Route::get('/getallproduct', 'ProductController@index');

    Route::get('/getproduct/{id}', 'ProductController@show');
    Route::delete('/deleteproduct/{id}', 'ProductController@destroy');
    Route::post('/addproduct', 'ProductController@store');
    Route::post('/storeproduct/{id}', 'ProductController@update');
    Route::post('/addorder', 'OrderController@store');
    Route::get('/getorders', 'OrderController@index');
    Route::get('getmyorders', 'OrderController@myOrders');

});
