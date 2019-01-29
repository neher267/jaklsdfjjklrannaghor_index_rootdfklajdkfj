<?php

/*
|--------------------------------------------------------------------------
| Not Used Routes
|--------------------------------------------------------------------------
*/

Route::get('all-gifts', 'PublicController@gifts');
Route::get('all-gifts/{gift}', 'PublicController@gift_details');
Route::get('categories','PublicController@categories');
Route::get('/{category}/types','PublicController@category_types');
Route::get('{product}/packages', 'PublicController@product_packages');

Route::group(['middleware'=>['sentinel.auth']], function(){
	Route::resource('purchases','PurchaseController');
	Route::get('my-purchases', 'PurchaseController@individualIndex');
});

Route::get('{title}/{package}', 'PublicController@package_details');