<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DragoncityController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





// DragonCity Welcome URL
Route::get('/', [DragoncityController::class, 'home'])->name('dragoncity.home');

Route::get('/shop/{id}', [DragoncityController::class, 'shop'])->name('dragoncity.shop');



Route::get('/dashboard', [DragoncityController::class, 'home'])->name('dragoncity.home');




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::middleware(['prevent-back-history'])->group(function () {
        //Profile URLs
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/password', [UserController::class, 'password'])->name('profile.password');
    });

    //Admin Middleware
    Route::middleware(['admin'])->group(function () {
        //Admin URLs
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        //Category URLs
        Route::prefix('admin/category')->group(function () {
            Route::get('/page', [CategoryController::class, 'page'])->name('category.page');
            Route::post('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::get('/list', [CategoryController::class, 'list'])->name('category.list');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        });

        //Product URLs
        Route::prefix('admin/product')->group(function () {
            Route::get('/page', [ProductController::class, 'page'])->name('product.page');
            Route::post('/create', [ProductController::class, 'create'])->name('product.create');
            Route::get('/list', [ProductController::class, 'list'])->name('product.list');
            Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        });

        //Order URLs
        Route::prefix('admin/order')->group(function () {
            Route::get('/list', [OrderController::class, 'orderList'])->name('order.list');
            Route::get('/deliver/{number}', [OrderController::class, 'orderDeliver'])->name('order.deliver');
            Route::get('/detail/{number}', [OrderDetailController::class, 'orderDetail'])->name('order.detail');
            Route::get('/delete/{number}', [OrderController::class, 'orderDelete'])->name('order.delete');
        });


        //User Account URLs
        Route::prefix('admin/account/user')->group(function () {
            Route::get('/list', [AdminController::class, 'userList'])->name('user.list');
            Route::get('/detail/{id}', [AdminController::class, 'userDetail'])->name('user.detail');
            Route::get('/promote/{id}', [AdminController::class, 'promote'])->name('promote');
            Route::get('/delete/{id}', [AdminController::class, 'userDelete'])->name('user.delete');
        });


        //Admin Account URLs
        Route::prefix('admin/account/')->group(function () {
            Route::get('/list', [AdminController::class, 'adminList'])->name('admin.list');
            Route::get('/detail/{id}', [AdminController::class, 'adminDetail'])->name('admin.detail');
            Route::get('/demote/{id}', [AdminController::class, 'demote'])->name('demote');
            Route::get('/delete/{id}', [AdminController::class, 'adminDelete'])->name('admin.delete');

        });
    });





    //User Middleware
    Route::middleware(['user'])->group(function () {
        //User URLs
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'cart'])->name('cart');
        Route::get('/cart/product/delete', [CartController::class, 'deleteProduct'])->name('cart.product.delete');
        Route::get('/cart/clear', [CartController::class, 'cartClear'])->name('cart.clear');
        Route::post('/order', [OrderController::class, 'order'])->name('order');
    });











    // Route::get('/', function () {
    //     return view('dragoncity');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dragoncity');
    // })->name('dragoncity.home');



    // Using Middleware
    // Route::middleware([
    //     'auth:sanctum',
    //     config('jetstream.auth_session'),
    //     'verified',
    // ])->group(function () {
    //     Route::get('/', function () {
    //         return view('dragoncity');
    //     })->name('/');
    // });




});
