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

//Route::get('/', function () {
  //  return view('frontend.index');
//});

Route::get('/','Frontend\FrontendController@index');
Route::get('new-arrivals','Frontend\FrontendController@newarrival');
Route::get('featured','Frontend\FrontendController@featured');
Route::get('popular-products','Frontend\FrontendController@popular');
Route::get('offer-products','Frontend\FrontendController@offer');
Route::get('about-us','Frontend\FrontendController@aboutus');


Auth::routes();
//Frontend
Route::get('/searchajax', 'Frontend\CollectionController@SearchautoComplete')->name('searchproductajax');
Route::post('/searching', 'Frontend\CollectionController@result');

Route::get('collection/{group_url}','Frontend\CollectionController@groupview');
Route::get('collection/{group_url}/{cate_url}','Frontend\CollectionController@categoryview');
Route::get('collection/{group_url}/{cate_url}/{subcate_url}','Frontend\CollectionController@subcategoryview');
Route::get('collection/{group_url}/{cate_url}/{subcate_url}/{prod_url}','Frontend\CollectionController@productview');
Route::post('add-to-cart','Frontend\CartController@addtocart');
Route::get('/cart','Frontend\CartController@index');
Route::get('/load-cart-data','Frontend\CartController@cartloadbyajax');
Route::post('update-to-cart','Frontend\CartController@updatetocart');
Route::delete('delete-from-cart','Frontend\CartController@deletefromcart');
Route::get('clear-cart','Frontend\CartController@clearcart');

Route::get('/thank-you','Frontend\CartController@thankyou');


Route::group(['middleware'=>['auth', 'isUser']],function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/my-profile', 'Frontend\UserController@myprofile');
    Route::post('/my-profile-update','Frontend\UserController@profileupdate');
    //Checkout
    Route::get('checkout', 'Frontend\CheckoutController@index');
    Route::post('place-order','Frontend\CheckoutController@storeorder');
    //eSewa
    Route::post('/confirm-esewa-payment','Frontend\CheckoutController@checkamount');


});
Route::group(['middleware'=>['auth', 'IsAdmin']],function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('registered-user','Admin\RegisterController@index');
    Route::get('role-edit/{id}','Admin\RegisterController@edit');
    Route::put('role-update/{id}','Admin\RegisterController@updaterole');
    //Groups
    Route::get('group','Admin\GroupController@index');
    Route::get('group-add', 'Admin\GroupController@viewpage');
    Route::post('group-store', 'Admin\GroupController@store');
    Route::get('group-edit/{id}','Admin\GroupController@edit');
    Route::put('group-update/{id}','Admin\GroupController@update');
    Route::get('group-delete/{id}','Admin\GroupController@delete');
    Route::get('group-deleted-records','Admin\GroupController@deletedrecords');
    Route::get('group-re-store/{id}','Admin\GroupController@deletedrestore');

    //Category
    Route::get('/category','Admin\CategoryController@index');
    Route::get('category-add','Admin\CategoryController@create');
    Route::post('/category-store','Admin\CategoryController@store');
    Route::get('category-edit/{id}','Admin\CategoryController@edit');
    Route::put('category-update/{id}','Admin\CategoryController@update');
    Route::get('category-delete/{id}','Admin\CategoryController@delete');
    Route::get('category-deleted-records','Admin\CategoryController@deletedrecords');
    Route::get('category-re-store/{id}','Admin\CategoryController@deletedrestore');

    //Sub-Category
    Route::get('sub-category','Admin\SubCategoryController@index');
    Route::post('sub-category-store','Admin\SubCategoryController@store');
    Route::get('subcategory-edit/{id}','Admin\SubCategoryController@edit');
    Route::put('sub-category-update/{id}','Admin\SubCategoryController@update');
    Route::get('subcategory-delete/{id}','Admin\SubCategoryController@delete');
    Route::get('subcategory-deleted-records','Admin\SubCategoryController@deletedrecords');
    Route::get('subcategory-re-store/{id}','Admin\SubCategoryController@deletedrestore');

    //Products

    Route::get('products','Admin\ProductController@index');
    Route::get('add-products','Admin\ProductController@create');
    Route::post('store-products','Admin\ProductController@store');
    Route::get('edit-products/{id}','Admin\ProductController@edit');
    Route::put('update-products/{id}','Admin\ProductController@update');
    Route::get('delete-products/{id}','Admin\ProductController@delete');
    Route::get('deleted-records-products','Admin\ProductController@deletedrecords');
    Route::get('re-store-products/{id}','Admin\ProductController@deletedrestore');

    //Orders
    Route::get('orders', 'Admin\OrderController@index');
    Route::get('order-view/{order_id}','Admin\OrderController@vieworder');
    Route::get('generate-invoice/{order_id}','Admin\OrderController@invoice');
    Route::get('order-proceed/{order_id}','Admin\OrderController@proceedorder');
    Route::put('order/update-tracking-status/{order_id}','Admin\OrderController@trackingstatus');
    Route::put('order/cancel-order/{order_id}','Admin\OrderController@cancelorder');
    Route::put('order/complete-order/{order_id}','Admin\OrderController@complete');

});




