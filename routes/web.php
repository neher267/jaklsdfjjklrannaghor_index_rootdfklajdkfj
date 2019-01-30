<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'PublicController@index');
Route::get('contact', 'PublicController@contact_us');
Route::get('categories/{category}/foods','PublicController@category_foods')->name('category.foods');
Route::get('checkout','CheckoutController@index');	
Route::post('inquiries', 'InquiryController@store');	
Route::get('menu', 'PublicController@menu');
Route::get('menu/{product}', 'PublicController@menu_item_details')->name('food-detatils');

/*--Cart--*/
Route::post('add-to-cart/{product}', 'CartController@add_to_cart')->name('add-to-cart');
Route::post('cart/{product}/add', 'CartController@add')->name('cart.add');
Route::post('cart', 'AjaxRequestController@cart');
Route::post('cart-update', 'CartController@cart_update');
Route::post('remove-item', 'CartController@remove_item');
/*--End Cart--*/

Route::group(['namespace'=>'Auth', 'middleware'=>['guest']], function()
{
	Route::get('login','SentinelLoginController@login');	
	Route::post('login','SentinelLoginController@post_login');
	Route::get('signup','CustomerRegisterController@create');
	Route::post('signup','CustomerRegisterController@store');
});


/*
|--------------------------------------------------------------------------
| This routes are used when customer is logged in
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>['customer']], function()
{
	Route::get('orders','CustomerOrdersController@index')->name('customer.orders.index');
	Route::get('orders/{order}','CustomerOrdersController@show')->name('customer.orders.show');
	Route::post('orders','CustomerOrdersController@store')->name('customer.orders.store');	

	Route::get('profile','ProfileController@index');
	Route::get('profile-update','ProfileController@edit');
	Route::post('profile-update','ProfileController@update');
	Route::post('products/{product}/comments','CommentsController@store')
				->name('product.comment.store');
	Route::post('products/{product}/comments/{comment}/replay','CommentsController@replay_store')
				->name('comment.replay.store');
});

/*----Administration--------*/

Route::group(['prefix'=>'dashboard', 'middleware'=>['management']], function()
{
	Route::get('/','DashboardController@index');

	Route::group(['middleware'=>['chairman']], function()
	{
		Route::get('employee-register','Auth\EmployeeRegisterController@create')->name('employee-register');	
		Route::post('employee-register','Auth\EmployeeRegisterController@store');
	});

	Route::group(['namespace'=>'Settings','middleware'=>['chairman']], function()
	{
		Route::resource('areas','AreaController');

		/*-----branch----*/		
		Route::get('areas/{area}/branches', 'AreaController@branches')->name('area.branches');
		Route::resource('branches','BranchController');
		Route::get('branches/{branch}/address/create', 'BranchAddressController@create')->name('branch.address.create');
		Route::post('branches/{branch}/address', 'BranchAddressController@store')->name('branch.address.store');
		Route::get('branches/{branch}/address/edit', 'BranchAddressController@edit')->name('branch.address.edit');
		Route::put('branches/{branch}/address/update', 'BranchAddressController@update')->name('branch.address.update');
		/*-----end branch----*/	

		/*-----category------*/
		Route::resource('categories','CategoryController');
		Route::get('category/{category}/products', 'CategoryController@products')->name('category.products');
		Route::get('categories/{category}/images', 'CategoryImageController@index')->name('category.images.index');
		Route::post('categories/{category}/images', 'CategoryImageController@store')->name('category.images.store');
		Route::get('categories/{category}/images/create', 'CategoryImageController@create')->name('category.images.create');
		Route::PUT('categories/{category}/images/{image}', 'CategoryImageController@update')->name('category.images.update');
		Route::DELETE('categories/{category}/images/{image_id}', 'CategoryImageController@destroy')
					->name('category.images.destroy');
		/*-----category------*/

		/*-----department------*/
		Route::resource('departments','DepartmentController');
		Route::get('departments/{department}/categories', 'DepartmentController@categories')->name('department.categories');
		Route::resource('districts','DistrictController');
		Route::get('districts/{district}/areas', 'DistrictController@areas')->name('district.areas');
		Route::resource('roles','RoleController')->middleware('chairman');
		Route::get('roles/{role}/users', 'RoleController@users')->name('role.users');
		/*-----end department------*/

		/*-------gifts-------*/
		Route::resource('gifts','GiftController');	
		Route::get('gifts/{gift}/images', 'GiftImageController@index')->name('gift.images.index');
		Route::post('gifts/{gift}/images', 'GiftImageController@store')->name('gift.images.store');
		Route::get('gifts/{gift}/images/create', 'GiftImageController@create')->name('gift.images.create');
		Route::get('gifts/{gift}/images/{image_id}/edit', 'GiftImageController@edit')->name('gift.images.edit');
		Route::PUT('gifts/{gift}/images/{image_id}', 'GiftImageController@update')->name('gift.images.update');
		Route::DELETE('gifts/{gift}/images/{image_id}', 'GiftImageController@destroy')->name('gift.images.destroy');
		/*-------gifts-------*/		
	});

	Route::group(['namespace'=>'Hr'], function()
	{
		/*---Manage Customer orders-------*/
		/*---Access Permission for cahirman and salesman--*/		
		Route::get('orders-filter/{status}', 'OrderController@index')->name('orders.index');
		Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
		Route::POST('orders/{order}/status-change', 'OrderController@change_status')->name('orders.status');
		/*---End Manage Customer orders-------*/

	});



	Route::group(['middleware'=>['admin']], function(){
		Route::resource('packages','PackageController');
		Route::resource('trets','TretController');
	});

	Route::group(['middleware'=>['admin']], function(){
		Route::get('inquiries', 'InquiryController@index');
		Route::get('inquiries/{inquiry}', 'InquiryController@show')->name('inquiries.show');
		Route::DELETE('inquiries/{inquiry}', 'InquiryController@destroy')->name('inquiries.destroy');
	});

	
	Route::group(['namespace'=>'Hr'], function(){
		Route::resource('stock','StockController');
		Route::resource('trets','TretController');

		Route::get('type-images/{type}','ImageController@type_index')->name('type.images');
		Route::resource('images','ImageController');

		//image details
		Route::get('images/{image}/details/create', 'ImageDetailsController@create')->name('image.details.create');
		Route::POST('images/{image}/details', 'ImageDetailsController@store')->name('image.details.store');
		Route::get('images/{image}/details/show', 'ImageDetailsController@show')->name('image.details.show');
		Route::get('images/{image}/details/edit', 'ImageDetailsController@edit')->name('image.details.edit');
		Route::PUT('images/{image}/details/update', 'ImageDetailsController@update')->name('image.details.update');
		//end image details

		//expense
		Route::resource('expenses','ExpenseController');
		Route::get('my-expenses', 'ExpenseController@individualIndex');
		//end expense
		Route::resource('products','ProductController');	
		//Product Image
		Route::get('products/{product}/images', 'ProductImageController@index')->name('product.images.index');
		Route::post('products/{product}/images', 'ProductImageController@store')->name('product.images.store');
		Route::get('products/{product}/images/create', 'ProductImageController@create')->name('product.images.create');
		Route::get('products/{product_id}/images/{image_id}/edit', 'ProductImageController@edit')->name('product.images.edit');
		Route::PUT('products/{product}/images/{image}', 'ProductImageController@update')->name('product.images.update');
		Route::DELETE('products/{product_id}/images/{image_id}', 'ProductImageController@destroy')->name('product.images.destroy');
		//end product image	
		//product package
		Route::get('products/{product}/packages', 'ProductPackageController@packages')->name('product.packages');
		Route::get('products/{product}/packages/create','ProductPackageController@create')->name('product.packages.create');
		Route::get('products/{product}/packages/{package}/edit','ProductPackageController@edit')->name('product.packages.edit');
		Route::post('products/{product}/packages', 'ProductPackageController@store')->name('product.packages.store');
		Route::PUT('products/{product}/packages/{package}', 'ProductPackageController@update')->name('product.packages.update');
		Route::DELETE('products/{product}/packages/{package}', 'ProductPackageController@destroy')->name('product.packages.destroy');
		//end product package
		//product package image
		Route::get('products/{product_id}/packages/{package}/images', 'ProductPackageImageController@index')
			->name('product.package.images.index');
		Route::get('products/{product_id}/packages/{package}/images/create', 'ProductPackageImageController@create')
			->name('product.package.images.create');
		Route::post('products/{product_id}/packages/{package}/images', 'ProductPackageImageController@store')
			->name('product.package.images.store');
		Route::get('products/{product_id}/packages/{package}/images/{image_id}/edit', 'ProductPackageImageController@edit')
			->name('product.package.images.edit');
		Route::PUT('products/{product_id}/packages/{package}/images/{image_id}', 'ProductPackageImageController@update')
			->name('product.package.images.update');
		Route::DELETE('products/{product_id}/packages/{package}/images/{image_id}', 'ProductPackageImageController@destroy')->name('product.package.images.destroy');
		//end product package image		
	});
});
// end admin panel


/*----User Log out----*/
Route::post('logout', 'Auth\SentinelLoginController@logout')->middleware('sentinel.auth');







