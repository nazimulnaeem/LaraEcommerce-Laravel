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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Frontend\PagesController@index')->name('index');


// route for user
Route::group(['prefix'=>'user', 'namespace'=>'Frontend'],function(){

Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
Route::get('/dashboard', 'UsersController@dashboard')->name('user.dashboard');
Route::get('/profile', 'UsersController@profile')->name('user.profile');
Route::post('/profile/update', 'UsersController@profileUpdate')->name('user.profile.update');

});

// route for Cart
Route::group(['prefix'=>'carts', 'namespace'=>'Frontend'],function(){

    Route::get('/', 'CartController@index')->name('carts');
    Route::post('/store', 'CartController@store')->name('cart.store');
    Route::post('/update/{id}', 'CartController@update')->name('cart.update');
    Route::delete('/delete/{id}', 'CartController@destroy')->name('cart.delete');
    
    });

    // route for Checkouts
    Route::group(['prefix'=>'checkouts', 'namespace'=>'Frontend'],function(){
    
        Route::get('/', 'CheckoutsController@index')->name('checkouts');
        Route::post('/store', 'CheckoutsController@store')->name('checkout.store');
        
        });


Route::group(['prefix'=>'products', 'namespace'=>'Frontend'],function(){

    Route::get('/', 'ProductController@index')->name('products');
    Route::get('/{slug}', 'ProductController@show')->name('product.show');
    Route::get('/new/search', 'PagesController@search')->name('search');


    // Category route
    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::get('/category/{id}', 'CategoryController@show')->name('categories.show');

    });




// for admin pannel
Route::group(['prefix'=>'admin', 'namespace'=>'Backend'],function(){
    Route::get('/','AdminPagesController@index')->name('admin.index');

    // for admin authentication 
    Route::get('/login','admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit','admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit','admin\LoginController@logout')->name('admin.logout');

    // password email send
    Route::get('/password/reset','admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/resetPost','admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

     // password reset
     Route::get('/password/reset/{token}','admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
     Route::post('/password/email','admin\ResetPasswordController@reset')->name('admin.password.update');
 

    // product route
    Route::group(['prefix'=>'products'],function(){

    Route::get('/create','ProductController@product_create')->name('admin.product.create');
    Route::get('/','ProductController@manage_product')->name('admin.product');
    Route::post('/create','ProductController@product_store')->name('admin.product.store');
    Route::get('/edit/{id}','ProductController@product_edit')->name('admin.product.edit');
    Route::post('/edit/{id}','ProductController@product_update')->name('admin.product.update');
    Route::delete('/delete/{id}','ProductController@product_destroy')->name('admin.product.destroy');

});


//   Order route
    Route::group(['prefix'=>'orders'],function(){

    Route::get('/','OrdersController@index')->name('admin.orders');
    Route::get('/view/{id}','OrdersController@show')->name('admin.order.show');
    Route::delete('/delete/{id}','OrdersController@destroy')->name('admin.order.destroy');

    
    Route::post('/completed/{id}','OrdersController@completed')->name('admin.order.completed');
    Route::post('/paid/{id}','OrdersController@paid')->name('admin.order.paid');

    Route::post('/charge-update/{id}','OrdersController@chargeUpdate')->name('admin.order.charge');
    Route::get('/invoice/{id}','OrdersController@generateInvoice')->name('admin.order.invoice');

});


//   category route
    Route::group(['prefix'=>'categories'],function(){

    Route::get('/','CategoryController@index')->name('admin.categories');
    Route::get('/create','CategoryController@create')->name('admin.category.create');
    Route::post('/create','CategoryController@store')->name('admin.category.store');
    Route::get('/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    Route::post('/update/{id}','CategoryController@update')->name('admin.category.update');
    Route::delete('/delete/{id}','CategoryController@destroy')->name('admin.category.destroy');

});

//   Brand route
    Route::group(['prefix'=>'brands'],function(){

    Route::get('/','BrandController@index')->name('admin.brands');
    Route::get('/create','BrandController@create')->name('admin.brand.create');
    Route::post('/create','BrandController@store')->name('admin.brand.store');
    Route::get('/edit/{id}','BrandController@edit')->name('admin.brand.edit');
    Route::post('/update/{id}','BrandController@update')->name('admin.brand.update');
    Route::delete('/delete/{id}','BrandController@destroy')->name('admin.brand.destroy');

});

//   Division route
    Route::group(['prefix'=>'divisions'],function(){

    Route::get('/','DivisionController@index')->name('admin.divisions');
    Route::get('/create','DivisionController@create')->name('admin.division.create');
    Route::post('/create','DivisionController@store')->name('admin.division.store');
    Route::get('/edit/{id}','DivisionController@edit')->name('admin.division.edit');
    Route::post('/update/{id}','DivisionController@update')->name('admin.division.update');
    Route::delete('/delete/{id}','DivisionController@destroy')->name('admin.division.destroy');

});

//   District route
    Route::group(['prefix'=>'districts'],function(){

    Route::get('/','DistrictController@index')->name('admin.districts');
    Route::get('/create','DistrictController@create')->name('admin.district.create');
    Route::post('/create','DistrictController@store')->name('admin.district.store');
    Route::get('/edit/{id}','DistrictController@edit')->name('admin.district.edit');
    Route::post('/update/{id}','DistrictController@update')->name('admin.district.update');
    Route::delete('/delete/{id}','DistrictController@destroy')->name('admin.district.destroy');

});

//   Slider route
Route::group(['prefix'=>'sliders'],function(){

    Route::get('/','SlidersController@index')->name('admin.sliders');
    Route::get('/create','SlidersController@create')->name('admin.slider.create');
    Route::post('/create','SlidersController@store')->name('admin.slider.store');
    Route::get('/edit/{id}','SlidersController@edit')->name('admin.slider.edit');
    Route::post('/update/{id}','SlidersController@update')->name('admin.slider.update');
    Route::delete('/delete/{id}','SlidersController@destroy')->name('admin.slider.destroy');

});



});



// API Route
Route::get('get-districts/{id}',function($id){
return json_encode(App\Models\District::where('division_id',$id)->get());
});