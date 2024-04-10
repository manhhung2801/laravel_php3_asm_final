<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductImageGallery;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Frontend\CheckoutOrderController;
use App\Http\Controllers\Admin\ProductVariantItemController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\ManagerOrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/** Home Page */
Route::name('shop.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    /** Product */
    Route::resource('product', FrontendProductController::class);

    /** Add to Cart routes */
    Route::post('add-to-cart',[CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('show-cart',[CartController::class, 'showCart'])->name('show-cart');
    Route::post('cart/update-quantity',[CartController::class, 'updateProductQty'])->name('cart.update-quantity');
    Route::get('clear-cart',[CartController::class, 'clearCart'])->name('clear.cart');
    Route::get('cart/remove-product/{rowId}',[CartController::class, 'removeProduct'])->name('cart.remove-product');
    Route::get('cart-count',[CartController::class, 'getCartCount'])->name('cart-count');

    Route::get('apply-voucher',[CartController::class, 'applyVoucher'])->name('apply-voucher');

    // page All product
    Route::get('list-product', [FrontendProductController::class, 'index'])->name('list-product');
    // filter product category
    Route::get('filter-product-category/{id}', [FrontendProductController::class, 'filterProductCategory'])->name('filter-product-category');
    // checkout order
    Route::get('checkout-order', [CheckoutOrderController::class, 'index'])->name('checkout-order');
    Route::post('order', [CheckoutOrderController::class, 'order'])->name('order');
    // manage order user

    Route::get('manager-order', [ManagerOrderController::class, 'index'])->name('manager-order');

});
/** Home Page */

/** Admin Dashboard */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /** users */
    Route::get('all-users', [UserController::class, 'index'])->name('all-users');
    Route::put('change-status-user', [UserController::class, 'ChangeStatus'])->name('change-status-user');
    Route::delete('delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

    /** category */
    Route::put('change-status-category', [CategoryController::class, 'ChangeStatus'])->name('change-status-category');
    Route::resource('category', CategoryController::class);

    /** product */
    Route::put('change-status-product', [ProductController::class, 'ChangeStatus'])->name('change-status-product');
    Route::resource('product', ProductController::class);

    /** product image gallery */
    Route::get('product-image-gallery/{id}', [ProductImageGallery::class, 'index'])->name('product-image-gallery');
    Route::post('add-product-image-gallery', [ProductImageGallery::class, 'add'])->name('add-product-image-gallery');
    Route::delete('delete-product-image-gallery/{id}', [ProductImageGallery::class, 'destroy'])->name('delete-product-image-gallery');

    /** product variants */
    Route::get("product-variant/{id}", [ProductVariantController::class, 'index'])->name('product-variant');
    Route::get("product-variant-create/{id}", [ProductVariantController::class, 'create'])->name('product-variant-create');
    Route::post("product-variant-store", [ProductVariantController::class, 'store'])->name('product-variant-store');
    Route::get("product-variant-edit/{id}", [ProductVariantController::class, 'edit'])->name('product-variant-edit');
    Route::put("product-variant-update/{id}", [ProductVariantController::class, 'update'])->name('product-variant-update');
    Route::delete("product-variant-delete/{id}", [ProductVariantController::class, 'destroy'])->name('product-variant-delete');
    Route::put('change-status-product-variant', [ProductVariantController::class, 'ChangeStatus'])->name('change-status-product-variant');

    /** product variant items */
    Route::get('product-variant-item/{id}', [ProductVariantItemController::class, 'index'])->name('product-variant-item');
    Route::get('product-variant-item-create/{id}', [ProductVariantItemController::class, 'create'])->name('product-variant-item-create');
    Route::post('product-variant-item-store', [ProductVariantItemController::class, 'store'])->name('product-variant-item-store');
    Route::get('product-variant-item-edit/{id}', [ProductVariantItemController::class, 'edit'])->name('product-variant-item-edit');
    Route::put('product-variant-item-update/{id}', [ProductVariantItemController::class, 'update'])->name('product-variant-item-update');
    Route::delete('product-variant-item-delete/{id}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item-delete');
    Route::put('change-status-product-variant-item', [ProductVariantItemController::class, 'ChangeStatus'])->name('change-status-product-variant-item');


    /** Voucher */
    Route::resource('vouchers', VoucherController::class);

});
/** Admin Dashboard */
