<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CarouselController as AdminCarouselController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductGalleryController as AdminProductGalleryController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'detail'])->name('categories-detail');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');

Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');
Route::get('/success', [CartController::class, 'success'])->name('success');
Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');


Route::group(['middleware' => ['auth']], function () {

  Route::get('/cart', [CartController::class, 'index'])->name('cart');
  Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

  Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::controller(DashboardProductController::class)->group(function () {
    Route::get('/dashboard/products', 'index')->name('dashboard-products');
    Route::get('/dashboard/products/create', 'create')->name('dashboard-product-create');
    Route::post('/dashboard/products', 'store')->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', 'details')->name('dashboard-product-details');
    Route::post('/dashboard/products/{id}', 'update')->name('dashboard-product-update');

    Route::post('/dashboard/products/gallerery/upload', 'uploadGallery')
      ->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallerery/delete/{id}', 'deleteGallery')
      ->name('dashboard-product-gallery-delete');
  });

  Route::controller(DashboardTransactionController::class)->group(function () {
    Route::get('/dashboard/transactions', 'index')->name('dashboard-transaction');
    Route::get('/dashboard/transactions/{id}', 'details')->name('dashboard-transaction-details');
    Route::post('/dashboard/transactions/{id}', 'update')->name('dashboard-transaction-update');
  });

  Route::controller(DashboardSettingController::class)->group(function () {
    Route::get('/dashboard/settings', 'store')->name('dashboard-settings-store');
    Route::get('/dashboard/account', 'account')->name('dashboard-settings-account');
    Route::post('/dashboard/account/{redirect}', 'update')->name('dashboard-settings-redirect');
  });
});


Route::prefix('admin')
  // ->namespace('Admin')
  ->middleware('auth', 'admin')
  ->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('gallery-product', AdminProductGalleryController::class);
    Route::resource('transaction', AdminTransactionController::class);
    Route::resource('carousel', AdminCarouselController::class);
  });

Auth::routes();
