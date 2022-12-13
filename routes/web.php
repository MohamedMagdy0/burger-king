<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;  // products -> dashboard


Route::get('/', function () {
    return view('frontend.index');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'

    ])->group(function ()
     {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
});


// logout
use App\Http\Controllers\BackendController;
Route::get('/logout', [BackendController::class, 'logout'])->name('logout');



// products route ->dashboard
Route::group( [
    'prefix' => 'admin',
    'middleware' => ['auth' , 'admin'],
    ],
    function () {

     //  products
    //  use App\Http\Controllers\ProductController;
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');

    //  products softDelete
    Route::delete('/products/softdelet/{id}', [ProductController::class, 'soft_delete'])->name('products.soft_delete'); // soft_delete
    Route::get('/products/trash', [ProductController::class, 'products_trash'])->name('products.products_trash'); // soft_delete
    Route::get('/products/restore/{id}', [ProductController::class, 'products_restore'])->name('products.products_restore'); // products_restore
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete'); // destroy

}) ;



 //  orders
  use App\Http\Controllers\OrderController;
 Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
 Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
 Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
 Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('orders.show');
 Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
 Route::put('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');

    //  products softDelete
 Route::delete('/orders/softdelet/{id}', [OrderController::class, 'soft_delete'])->name('orders.soft_delete'); // soft_delete
 Route::get('/orders/trash', [OrderController::class, 'orders_trash'])->name('orders.orders_trash'); // soft_delete
 Route::get('/orders/restore/{id}', [OrderController::class, 'orders_restore'])->name('orders.orders_restore'); // products_restore
 Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.delete'); // destroy





// users
use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/admin_status/{id}', [UserController::class, 'admin_status'])->name('users.admin_status');
Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
// users  softDelete
Route::delete('/users/softdelete/{id}', [UserController::class, 'soft_delete'])->name('users.softdelete'); //soft-delete
Route::get('/users/trash', [UserController::class, 'users_trash'])->name('users.users_trash'); // users-trash
Route::get('/users/restore/{id}', [UserController::class, 'users_restore'])->name('users.users_restore'); // users-restore
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete'); // destroy

// payments
Route::get('/payments', [BackendController::class, 'index'])->name('payments.index');


// frontend routes
use App\Http\Controllers\FrontController;
Route::get('/burgers', [FrontController::class, 'burgers'])->name('burgers.index'); // index
Route::get('/burgers/products', [FrontController::class, 'products'])->name('burgers.products'); // products

Route::get('/burgers/single_product/{id}', [FrontController::class, 'single_product'])->name('burgers.single_product'); // products
Route::get('/burgers/single_product', [FrontController::class, 'burgers'])->name('burgers'); // single_product without id

// cart controller
use App\Http\Controllers\CartController ;
Route::get('/burgers/cart', [CartController::class, 'cart'])->name('burgers.cart'); // cart

Route::post('/burgers/add_to_cart', [CartController::class, 'add_to_cart'])->name('burgers.add_to_cart'); // add_to_cart post
Route::get('/burgers/add_to_cart', [FrontController::class, 'burgers'])->name('burgers'); // add_to_cart get  return  "/"

Route::post('/burgers/remove_from_cart', [CartController::class, 'remove_from_cart'])->name('burgers.remove_from_cart'); // remove_from_cart post
Route::get('/burgers/remove_from_cart', [FrontController::class, 'burgers'])->name('burgers'); // remove_from_cart get  return  "/"

Route::post('/burgers/edit_product_quantity_btn', [CartController::class, 'edit_product_quantity_btn'])->name('burgers.edit_product_quantity_btn'); // edit_product_quantity_btn post
Route::get('/burgers/edit_product_quantity_btn', [CartConFrontControllertroller::class, 'burgers'])->name('burgers'); // edit_product_quantity_btn get  return  "/"

Route::post('/burgers/checkout', [CartController::class, 'checkout'])->name('burgers.checkout'); // edit_product_quantity_btn post
Route::get('/burgers/checkout', [FrontController::class, 'burgers'])->name('burgers'); // checkout get  return  "/"

//  orders
Route::post('/burgers/place_order', [CartController::class, 'place_order'])->name('burgers.place_order'); // place_order post
Route::get('/burgers/place_order', [FrontController::class, 'burgers'])->name('burgers'); // place_order get  return  "/"


// payment
use App\Http\Controllers\PaymentController ;
Route::post('/burgers/payment', [PaymentController::class, 'payment'])->name('burgers.payment'); // place_order post
Route::get('/burgers/payment', [FrontController::class, 'burgers'])->name('burgers'); // payment get  return  "/"


Route::get('/burgers/verify_payment/{transaction_id}', [PaymentController::class, 'verify_payment'])->name('burgers.verify_payment'); // verfiy_payment get
Route::get('/burgers/complate_payment', [PaymentController::class, 'complate_payment'])->name('burgers.complate_payment'); // complate_payment get
Route::get('/burgers/thank_you', [PaymentController::class, 'thank_you'])->name('burgers.thank_you'); // thank_you get

Route::get('/burgers/user_orders', [FrontController::class, 'user_orders'])->name('burgers.user_orders'); // user_orders get
Route::get('/burgers/detail_orders/{id}', [FrontController::class, 'detail_orders'])->name('burgers.detail_orders'); // detail_orders get

Route::get('/burgers/menu/{category}', [FrontController::class, 'burgers_menu'])->name('burgers.burgers_menu'); // burgers_menu get
