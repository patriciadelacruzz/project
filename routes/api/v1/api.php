<?php

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Api\V1'], function () {
  
      Route::group(['prefix' => 'products'], function () {
        Route::get('popular', 'ProductController@get_popular_products');
          Route::get('recommeded', 'ProductController@get_recommended_products');
      });

      Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::post('register', 'CustomerAuthController@register');
        Route::post('login', 'CustomerAuthController@login');
      });

      Route::group(['prefix' => 'address'], function (){
        Route::get('notifications', 'NotificationController@get_notifications');
        Route::get('info', 'CustomerController@info');
        Route::get('update-profile', 'CustomerController@update_profile');
        Route::get('update-interest', 'CustomerControler@update_interest');
        Route::get('cm-firebase', 'CustomerController@update_cm_firebase');
        Route::get('suggested-foods', 'CustomerController@get_suggested_foods');

        Route::group(['prefix' => 'address'], function (){
          Route::get('list', 'CustomerController@address_list');
          Route::post('add', 'CustomerController@add_new_address');
          Route::put('update/{id}', 'CustomerController@update_address');
          Route::delete('delete', 'CustomerController@delete_address');
        });
      
      Route::group(['prefix' => 'order'], function(){
        Route::get('list','OrderController@get_order_list');
        Route::get('running-orders', 'OrderController@get_running_orders');
        Route::get('details', 'OrderController@get_order_details');
        Route::post('place', 'OrderController@place_order');
        Route::put('cancel', 'OrderController@cancel_order');
        Route::put('refund-request', 'OrderController@refund_request');
        Route::get('track', 'OrderController@track_order');
        Route::put('payment-method', 'OrderController@update_payment_method');
      });
      
      });

      Route::group(['prefix' => 'config'], function(){
        Route::get('/', 'ConfigController@configuration');
        Route::get('/get-zoned-id', 'ConfigController@get_zone');
        Route::get('place-api-autocomplete', 'ConfigController@place_api_autocomplete');
        Route::get('distance-api', 'ConfigController@distance_api');
        Route::get('place-api-details', 'ConfigController@place_api_details');
        Route::get('geocode-api', 'ConfigController@geocode_api');
      });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
API THAT NEED TO PASS INTO FLUITTER 
*/
Route::get('/users', function(){
   
  /*$users =  DB::table('admin_users')->get();
  return response()->json($users);*/
});
