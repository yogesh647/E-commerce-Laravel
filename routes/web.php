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

/*Route::get('/', function () {
    return view('welcome');
});
*/



Route::get('/home', 'IndexController@home')->name('home');



// route for wayshop
Route::match(['get','post'],'/','Indexcontroller@index');
Route::match(['get','post'],'/admin','Admincontroller@login');

// route for product
Route::get('/category/{id}','Indexcontroller@category');
Route::get('/product/{id}','Productcontroller@product');
Route::get('/get_price','Productcontroller@getprice');

// route for add to cart
Route::match(['get','post'],'add-cart','Productcontroller@addcart');


// add to cart
Route::match(['get','post'],'/cart','Productcontroller@cart');

// route for delete cart product
Route::get('/cart/delete/{id}','Productcontroller@deleteaddcart');

// route for Apply Coupon code
Route::post('/cart/applycouponcode','Productcontroller@applycouponcode');

// route for login account
Route::match(['get','post'],'/login','Usercontroller@loginuser');
Route::post('/registeruser','Usercontroller@registeruser');
Route::get('/user-logout','Usercontroller@logout');

// route for congiration email
Route::get('/account/{code}','Usercontroller@confirmaccount');


// route for front login middleware
Route::group(['middleware'=>['frontlogin']],function(){
	
Route::match(['get','post'],'/account','Usercontroller@account');
Route::match(['get','post'],'/change_password','Usercontroller@changepassword');
Route::match(['get','post'],'/change_Address','Usercontroller@changeaddress');

// route for checkout
Route::match(['get','post'],'/checkout','Productcontroller@checkout');
Route::match(['get','post'],'/order_review','Productcontroller@order_review');
Route::match(['get','post'],'/place_order','Productcontroller@place_order');
Route::get('/thankyou','Productcontroller@thankyou');
Route::get('/user_order','Usercontroller@userorder');
Route::get('/user_order_details/{id}','Usercontroller@userorderdetails');

// route for stripe payement
Route::get('/stripe','Productcontroller@stripe');
Route::post('/stripe','Productcontroller@afterpayment');

	
});	




Route::group(['middleware'=>['auth']],function(){
	
Route::get('/dashboard','Admincontroller@dashbaord');

// route for order
Route::match(['get','post'],'/admin/view_order','Productcontroller@vieworder');
Route::match(['get','post'],'/admin/view_order_details/{id}','Productcontroller@vieworderdetails');
Route::post('/admin/orderStatus','Productcontroller@orderstatusupdate');
Route::get('/admin/invoice_order/{id}','Productcontroller@invoiceorder');


// route for customer details
Route::get('/admin/view_customer','Productcontroller@viewcustomer');
Route::post('/admin/customerStatus','Productcontroller@customerstatusupdate');
Route::get('/admin/delete_customer/{id}','Productcontroller@deletecustomer');


//route for product
Route::match(['get','post'],'/admin/add_product','Productcontroller@add_product');
Route::match(['get','post'],'/admin/view_product','Productcontroller@view_product');
Route::match(['get','post'],'/admin/edit_product/{id}','Productcontroller@edit_product');
Route::post('/admin/productStatus','Productcontroller@Productstatusupdate');
Route::get('/admin/delete_product/{id}','Productcontroller@delete_product');

//route for category
Route::match(['get','post'],'/admin/add_categories','Categorycontroller@add_category');
Route::match(['get','post'],'/admin/view_categories','Categorycontroller@view_category');
Route::match(['get','post'],'/admin/edit_categories/{id}','Categorycontroller@edit_category');
Route::post('/admin/CategoryStatus','Categorycontroller@Categorystatusupdate');
Route::get('/admin/delete_categories/{id}','Categorycontroller@delete_category');

// route for add attributes
Route::match(['get','post'],'/admin/addproduct_atrribute/{id}','Productcontroller@add_productatrribute');
Route::post('/admin/editproduct_atrribute/{id}','Productcontroller@editproductatrribute');
Route::get('/admin/delete_productatrributes/{id}','Productcontroller@delete_atrribute');

// route for banner
Route::match(['get','post'],'/admin/addbanner','Bannercontroller@addbanner');
Route::match(['get','post'],'/admin/viewbanner','Bannercontroller@viewbanner');
Route::match(['get','post'],'/admin/editbanner/{id}','Bannercontroller@editbanner');
Route::post('/admin/BannerStatus','Bannercontroller@bannerstatusupdate');
Route::get('/admin/deletebanner/{id}','Bannercontroller@deletebanner');

// route for coupons
Route::match(['get','post'],'/admin/addcoupon','Couponcontroller@addcoupon');
Route::match(['get','post'],'/admin/viewcoupon','Couponcontroller@viewcoupon');
Route::match(['get','post'],'/admin/editcoupon/{id}','Couponcontroller@editcoupon');
Route::post('/admin/CouponStatus','Couponcontroller@Couponstatusupdate');
Route::get('/admin/deletecoupon/{id}','Couponcontroller@deletecoupon');



// route for multiple image
Route::match(['get','post'],'/admin/add_products_image/{id}','Productcontroller@add_productsimage');
Route::get('/admin/delete_product_image/{id}','Productcontroller@delete_product_image');

	
});
Route::get('/logout','Admincontroller@logout');

