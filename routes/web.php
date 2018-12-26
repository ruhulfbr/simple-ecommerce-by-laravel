<?php

Route::get('/','HomeController@index');
Route::get('/category-product/{product_id}','HomeController@ProducByCategory');
Route::get('/brand-product/{brand_id}','HomeController@ProducByBrand');
Route::get('/view-product/{product_id}','HomeController@ViewProduct');

//Cart
Route::post('/add-to-cart','CartController@AddToCart');
Route::get('/show-cart', 'CartController@ShowCart');
Route::get('/delete-cart-item/{item_id}', 'CartController@DeleteCartItem');
Route::post('/update-cart','CartController@UpdateCart');

//Checkout Route
Route::get('/checkout-login','CheckoutController@CheckoutLogin');
Route::get('/checkout','CheckoutController@Checkout');
Route::post('/save-shipping-details', 'CheckoutController@SaveShipping_details');
Route::get('/payment','CheckoutController@Payment');
Route::post('/order-place', 'CheckoutController@OrderPlace');
Route::get('/success', 'CheckoutController@Success');

//Customer Area
Route::post('/customer-registration','CheckoutController@CustomerRegistration');
Route::post('/customer-login','CheckoutController@CustomerLogin');
Route::get('/customer-logout','CheckoutController@CustomerLogout');



//////////////////////////////////Backend Route Start Here///////////////////////////////////////////
Route::get('/logout','SuperadminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@ShowDashboard');
Route::post('/admin-dashboard','AdminController@Dashboard');

//Slider Route
Route::get('/add-slider','Slider@AddSlider');
Route::get('/all-slider','Slider@AllSlider');
Route::post('/save-slider','Slider@SaveSlider');
Route::get('/unactive-slider/{slider_id}', 'Slider@UnactiveSlider');
Route::get('/active-slider/{slider_id}', 'Slider@ActiveSlider');
Route::get('/delete-slider/{slider_id}', 'Slider@DeleteSlider');


//Caegory Route
Route::get('/add-category','Category@AddCategory');
Route::get('/all-category','Category@AllCategory');
Route::post('/save-category','Category@SaveCategory');
Route::get('/unactive-category/{category_id}', 'Category@unactive_category');
Route::get('/active-category/{category_id}', 'Category@active_category');
Route::get('/edit-category/{category_id}', 'Category@EditCategory');
Route::get('/delete-category/{category_id}', 'Category@DeleteCategory');
Route::post('/update-category','Category@UpdateCategory');

//Brand Route
Route::get('/add-brand','Brand@AddBrand');
Route::get('/all-brand','Brand@index');
Route::post('/save-brand','Brand@SaveBrand');
Route::get('/unactive-brand/{brand_id}', 'Brand@unactive_brand');
Route::get('/active-brand/{brand_id}', 'Brand@active_brand');
Route::get('/edit-brand/{brand_id}', 'Brand@EditBrand');
Route::post('/update-brand','Brand@UpdateBrand');
Route::get('/delete-brand/{brand_id}', 'Brand@DeleteBrand');

//Product Route
Route::get('/add-product','Product@AddProduct');
Route::get('/all-product','Product@index');
Route::post('/save-product','Product@SaveProduct');
Route::get('/unactive-product/{product_id}', 'Product@UnactiveProduct');
Route::get('/active-product/{product_id}', 'Product@ActiveProduct');
Route::get('/edit-product/{product_id}','Product@EditProduct');
Route::post('/update-product/{product_id}', 'Product@UpdateProduct');
Route::get('/delete-product/{product_id}','Product@DeleteProduct');


//Order Route
Route::get('/manage-order','ManageOrder@index');
Route::get('/complete-order/{order_id}','ManageOrder@CompleteOrder');
Route::get('/delete-order/{order_id}','ManageOrder@DeleteOrder');
Route::get('/view-order/{order_id}','ManageOrder@ViewOrder');

