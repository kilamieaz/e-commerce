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

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    });
    Route::resource('user', 'Admin\UserController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('subcategory', 'Admin\SubCategoryController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('cart', 'Admin\CartController');
    Route::resource('wishlist', 'Admin\WishlistController');
    Route::resource('comment', 'Admin\CommentController');
    Route::resource('reply', 'Admin\ReplyController');
    Route::resource('transaction', 'Admin\TransactionController');
});

Route::prefix('datatable')->group(function () {
    Route::get('user-datatable', 'Datatable\UserDataTableController@index')->name('datatable.users');
    Route::get('category-datatable', 'Datatable\CategoryDataTableController@index')->name('datatable.category');
    Route::get('sub-category-datatable', 'Datatable\SubCategoryDataTableController@index')->name('datatable.subcategory');
    Route::get('product-datatable', 'Datatable\ProductDataTableController@index')->name('datatable.product');
    Route::get('cart-datatable', 'Datatable\CartDataTableController@index')->name('datatable.cart');
    Route::get('wishlist-datatable', 'Datatable\WishlistDataTableController@index')->name('datatable.wishlist');
    Route::get('comment-datatable', 'Datatable\CommentDataTableController@index')->name('datatable.comment');
    Route::get('reply-datatable', 'Datatable\ReplyDataTableController@index')->name('datatable.reply');
    Route::get('transaction-datatable', 'Datatable\TransactionDataTableController@index')->name('datatable.transaction');
});

Route::get('/signin', function () {
    return view('login.login');
})->name('signin');
Route::get('/signup', function () {
    return view('register.register');
})->name('signup');

Route::resource('', 'User\HomeController');
Route::resource('user-cart', 'User\CartController');
Route::resource('user-wishlist', 'User\WishlistController');

Route::get('/checkout', function () {
    return view('user.checkout');
});

Route::get('/product-detail', function () {
    return view('user.product-detail');
});
Route::get('/product-listing', function () {
    return view('user.product-listing');
});
