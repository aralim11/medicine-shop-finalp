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

//Super Admin 
Route::get('/admin', 'AdminController@index');

//Admin Check
Route::post('/login-check', 'LogInCheck@adminCheck');

//Districts & Upozila

Route::get('/add/district', 'AdminDashController@addDistrict');
Route::get('/add/pstation', 'AdminDashController@addUpozila');
Route::post('/save/district', 'AdminDashController@saveDistrict');
Route::post('/save/upozila', 'AdminDashController@saveUpozila');
Route::get('/view/alldp', 'AdminDashController@manageDP');


//Dash Board - Seller Section
Route::get('/admin-dash', 'AdminDashController@index');
Route::get('/add/seller', 'AdminDashController@addSeller');
Route::post('/save/seller', 'AdminDashController@saveSelller');
Route::get('/view/seller', 'AdminDashController@manageSeller');
Route::get('/edit/seller/{id}', 'AdminDashController@editSeller');
Route::post('/update/seller', 'AdminDashController@updateSeller');
Route::get('/suspend/seller/{id}', 'AdminDashController@suspendSeller');
Route::get('/active/seller/{id}', 'AdminDashController@activeSeller');
Route::get('/delete/seller/{id}', 'AdminDashController@deleteSeller');



//Bill Pay
Route::get('/bill/payment/search', 'BillPayController@billPayYearSearch');
Route::post('/bill/payment/view', 'BillPayController@billPayView');

Route::get('/pay/request', 'BillPayController@payRequest');
Route::get('/send/request/warning/{id}', 'BillPayController@sendWarning');
Route::get('/pay/view/current', 'BillPayController@currentView');

//Remember Pass
Route::post('/adminrememberpass', 'RememberPass@adminrememberpass')->name('adminrememberpass');

// Admin Logout
Route::get('/logout', 'AdminDashController@adminLogout');





// Seller Section
Route::get('/seller', 'SellerController@index');
Route::get('/seller-dash', 'SellerDashController@index');

//Seller Log In Check
Route::post('/Seller-login-check', 'LogInCheck@sellerlogin_check');


//Brand
Route::get('/add/brand', 'SellerDashController@addBrand');
Route::post('/save/brand', 'SellerDashController@saveBrand');
Route::get('/view/brand', 'SellerDashController@manageBrand');
Route::get('/edit/brand/{id}', 'SellerDashController@editBrand');
Route::post('/update/brand', 'SellerDashController@updateBrand');
Route::get('/delete/brand/{id}', 'SellerDashController@deleteBrand');






// Product Info
Route::get('/add/product', 'ProductController@addProduct');
Route::post('/save/product', 'ProductController@saveProduct');
Route::get('/view/product', 'ProductController@manageProduct');
Route::get('/edit/product/{id}', 'ProductController@editProduct');
Route::post('/update/product', 'ProductController@updateProduct');
Route::get('/delete/product/{id}', 'ProductController@deleteProduct');



//purchase
Route::get('/purchase', 'PurchaseController@purchase');
Route::get('/add/purchase-product/{id}', 'PurchaseController@addPurchase');
Route::post('/save/purchase', 'PurchaseController@savePurchase');

//Stock
Route::get('/stock/product', 'StockController@stockProduct');


//Sale
Route::get('/sale/panel', 'SaleController@salePanel');
Route::get('/auto/{id}', 'SaleController@autocomplete');
Route::get('/xx/{id}', 'SaleController@XX');
Route::get('/delete/voucher/{id}', 'SaleController@deleteVoucherData');

//Report
Route::get('/purchase/report', 'ReportController@purchaseReport');
Route::post('/view/purchase/report', 'ReportController@viewPurchaseReport');
Route::get('/sale/report', 'ReportController@saleReport');
Route::post('/view/sale/report', 'ReportController@viewReport');

//Bill Pay
Route::get('/bill/pay/seller', 'BillPayController@sellerBill');
Route::post('/save/payment', 'BillPayController@savePayment');
Route::post('/view/bill-payment', 'BillPayController@sellerViewPayment');

//Profile
Route::get('/my/profile', 'ProfileController@index');
Route::get('/edit/profile', 'ProfileController@edit');
Route::post('/update/profile', 'ProfileController@update');
Route::get('/change/password', 'ProfileController@changePassword');
Route::post('/update/password', 'ProfileController@updatePassword');

//Invoice
Route::get('/invoice', 'InvoiceController@index');

//Print Pdf
Route::get('pdf', 'InvoiceController@Pdf');

//Remember Password
Route::post('/rememberpass', 'RememberPass@index')->name('rememberpass');

//Seller Log Out
Route::get('/seller-logout', 'SellerDashController@sellerLogout');


//Front
Route::get('/', 'WelcomeController@index');
Route::get('/product', 'WelcomeController@product');
Route::get('/contact', 'WelcomeController@contact');

//Become A Seller
Route::get('/becomeSeller', 'WelcomeController@becomeSeller');
Route::post('select-registration', ['as' => 'select-registration', 'uses' => 'WelcomeController@selectRegistration']);


Route::post('/registration', 'WelcomeController@Registration')->name('registration');
Route::get('/seller-request', 'WelcomeController@sellerRequest');
Route::get('/single/product/{id}', 'WelcomeController@productDetails');
Route::get('/accept/request/{id}', 'WelcomeController@acceptRequest');

Route::post('select-ajax', ['as' => 'select-ajax', 'uses' => 'WelcomeController@selectAjax']);
Route::post('search', 'WelcomeController@selectAjax')->name('search');
Route::get('/search', 'WelcomeController@selectAjax');



Route::post('select-quantity', ['as' => 'select-quantity', 'uses' => 'SaleController@selectAjax']);
Route::post('total-amount', 'SaleController@totalAmount')->name('total-amount');
Route::post('submitAmount', 'SaleController@cashCheck')->name('submitAmount');
