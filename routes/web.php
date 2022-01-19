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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/productlist', 'FrontendController@productList')->name('product.list');
Route::get('/category/wise/product/{category_id}', 'FrontendController@category_wise_product')->name('category-wise-product');
Route::get('/brand/wise/product/{brand_id}', 'FrontendController@brand_wise_product')->name('brand-wise-product');
Route::get('/product/details/{slug}', 'FrontendController@Productdetaisl')->name('productDetails');
Route::post('/product/find', 'FrontendController@FindProduct')->name('find.product');
Route::get('/product/get', 'FrontendController@GetProduct')->name('get.product');








//card route
Route::post('/add/card','CardController@addtocard')->name('insart.Card');
Route::get('/add/view','CardController@view')->name('view.Card');
Route::post('/add/cart/update','CardController@shopping_cart_update')->name('cart.update');
Route::get('/add/cart/delete/{rowId}','CardController@shopping_cart_delete')->name('delete.card');
//login and sign up and cheeckout

Route::get('/castomer/login','CheckOutController@CoustomerLogin')->name('castomer.login');
Route::get('/castomer/registaration','CheckOutController@CoustomerRegister')->name('register.login');
Route::post('/store/registaration','CheckOutController@StoreRegister')->name('register.store');
Route::get('/email-verify/conformation','CheckOutController@EmailVerfy')->name('email.verify');
Route::post('/email-code-verify','CheckOutController@VerfyCodeAndEmail')->name('varificationlogin');
Route::get('/checkout-auth','checkOutController@CheckoutAuth')->name('checkout.auth');
Route::post('/checkout/store','checkOutController@CheckoutStore')->name('checkout.store');


Auth::routes();
//Authantication for customer

Route::group(['middleware'=>['auth','Customer']],function(){
        Route::get('/deshbord','FrontendDeshbord@deshboard')->name('deshbord');
        Route::get('/customer-profile-edit','FrontendDeshbord@profileEdit')->name('customer.profile.edit');
        Route::post('/customer-profile-update','FrontendDeshbord@profileUpdate')->name('customer.profile.update');
        Route::get('/change-customer-password','FrontendDeshbord@changeCustomerPassword')->name('change.customer.password');
        Route::post('/update-customer-password','FrontendDeshbord@UpdateCustomerPassword')->name('update.customer.password');
        Route::get('/customer/payment','FrontendDeshbord@CustomerPayment')->name('customer.payment');
        Route::post('/customer/payment/method','FrontendDeshbord@PaymentMethod')->name('payment.method');
        Route::get('/customer/order/list','FrontendDeshbord@OrderList')->name('Order.list');
        Route::get('/customer/order/details/{id}','FrontendDeshbord@OrderDetails')->name('Order.Customer.Details');
        Route::get('/customer/order/print/{id}','FrontendDeshbord@OrderDetailsPrint')->name('Order.Customer.print');


});

//Authantican for Admin
Route::group(['middleware'=>['auth','Admin']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::prefix('user')->group(function () {
        Route::get('/view',  'Backend\UserController@view')->name('user.view');
        Route::get('/add',   'Backend\UserController@add')->name('user.add');
        Route::post('/store','Backend\UserController@store')->name('user.store');
        Route::get('/edit/{id}','Backend\UserController@edit')->name('user.edit');
        Route::post('/update/{id}','Backend\UserController@update')->name('user.update');
        Route::get('/delete/{id}','Backend\UserController@delete')->name('user.delete');
    });
});

Route::prefix('profile')->group(function () {
    Route::get('/view', 'Backend\ProfileController@view')->name('profile.view');
    Route::get('/edit', 'Backend\ProfileController@edit')->name('profile.edit');
    Route::post('/update', 'Backend\ProfileController@update')->name('profile.update');
    Route::get('/passwordview', 'Backend\ProfileController@passwordView')->name('password.view');
    Route::post('/passwordupdate', 'Backend\ProfileController@passwordUpdate')->name('update.password');
    
});

Route::prefix('order')->group(function () {
    Route::get('/view/padding/order', 'Backend\OrderController@PanddingOrder')->name('Pandding.Order');
    Route::get('/view/Approved/order', 'Backend\OrderController@ApprovedOrder')->name('Approved.Order');
    Route::get('/details/{id}', 'Backend\OrderController@OrderDetils')->name('Order.details');
    Route::get('/approved-order/{id}', 'Backend\OrderController@ApprovedOrderlist')->name('approved.orderlist');
    
});

Route::prefix('category')->group(function () {
    Route::get('/view',  'Backend\CategoryController@view')->name('category.view');
    Route::get('/add',   'Backend\CategoryController@add')->name('category.add');
    Route::post('/store','Backend\CategoryController@store')->name('category.store');
    Route::get('/edit/{id}','Backend\CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}','Backend\CategoryController@update')->name('category.update');
    Route::get('/delete/{id}','Backend\CategoryController@delete')->name('category.delete');
});

Route::prefix('brand')->group(function () {
    Route::get('/view',  'Backend\BrandController@view')->name('brand.view');
    Route::get('/add',   'Backend\BrandController@add')->name('brand.add');
    Route::post('/store','Backend\BrandController@store')->name('brand.store');
    Route::get('/edit/{id}','Backend\BrandController@edit')->name('brand.edit');
    Route::post('/update/{id}','Backend\BrandController@update')->name('brand.update');
    Route::get('/delete/{id}','Backend\BrandController@delete')->name('brand.delete');
});

Route::prefix('color')->group(function () {
    Route::get('/view',  'Backend\ColorController@view')->name('color.view');
    Route::get('/add',   'Backend\ColorController@add')->name('color.add');
    Route::post('/store','Backend\ColorController@store')->name('color.store');
    Route::get('/edit/{id}','Backend\ColorController@edit')->name('color.edit');
    Route::post('/update/{id}','Backend\ColorController@update')->name('color.update');
    Route::get('/delete/{id}','Backend\ColorController@delete')->name('color.delete');
});

Route::prefix('size')->group(function () {
    Route::get('/view',  'Backend\SizeController@view')->name('size.view');
    Route::get('/add',   'Backend\SizeController@add')->name('size.add');
    Route::post('/store','Backend\SizeController@store')->name('size.store');
    Route::get('/edit/{id}','Backend\SizeController@edit')->name('size.edit');
    Route::post('/update/{id}','Backend\SizeController@update')->name('size.update');
    Route::get('/delete/{id}','Backend\SizeController@delete')->name('size.delete');
});

Route::prefix('products')->group(function () {
    Route::get('/view',  'Backend\ProductsController@view')->name('products.view');
    Route::get('/add',   'Backend\ProductsController@add')->name('products.add');
    Route::post('/store','Backend\ProductsController@store')->name('products.store');
    Route::get('/edit/{id}','Backend\ProductsController@edit')->name('products.edit');
    Route::post('/update/{id}','Backend\ProductsController@update')->name('products.update');
    Route::get('/delete/{id}','Backend\ProductsController@delete')->name('products.delete');
    Route::get('/details/{id}','Backend\ProductsController@details')->name('products.details');
});

Route::prefix('logo')->group(function () {
    Route::get('/view',  'Backend\LogoController@view')->name('logo.view');
    Route::get('/add',   'Backend\LogoController@add')->name('logo.add');
    Route::post('/store','Backend\LogoController@store')->name('logo.store');
    Route::get('/edit/{id}','Backend\LogoController@edit')->name('logo.edit');
    Route::post('/update/{id}','Backend\LogoController@update')->name('logo.update');
    Route::get('/delete/{id}','Backend\LogoController@delete')->name('logo.delete');
});
Route::prefix('contact')->group(function () {
    Route::get('/view',  'Backend\ContactController@view')->name('contact.view');
    Route::get('/add',   'Backend\ContactController@add')->name('contact.add');
    Route::post('/store','Backend\ContactController@store')->name('contact.store');
    Route::get('/edit/{id}','Backend\ContactController@edit')->name('contact.edit');
    Route::post('/update/{id}','Backend\ContactController@update')->name('contact.update');
    Route::get('/delete/{id}','Backend\ContactController@delete')->name('contact.delete');
});

Route::prefix('slider')->group(function () {
    Route::get('/view',  'Backend\SliderController@view')->name('slider.view');
    Route::get('/add',   'Backend\SliderController@add')->name('slider.add');
    Route::post('/store','Backend\SliderController@store')->name('slider.store');
    Route::get('/edit/{id}','Backend\SliderController@edit')->name('slider.edit');
    Route::post('/update/{id}','Backend\SliderController@update')->name('slider.update');
    Route::get('/delete/{id}','Backend\SliderController@delete')->name('slider.delete');
});





