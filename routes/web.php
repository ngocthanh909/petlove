<?php

use App\Http\Controllers\AdminController as ad;
use App\Http\Controllers\LoginController as login;
use App\Http\Controllers\UserController as us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//USER LOGIN
Route::get('/auth/redirect', [login::class, 'redirect'])->name('login.facebook');
Route::get('/auth/callback', [login::class, 'callback'])->name('login.callback');
Route::get('/logout', [login::class, 'logout'])->name('user.logout');
Route::view('/login', 'user.login')->name('user.login');
Route::get('/poli', function () {
    return "Poly";
});
// Test route login
Route::get('/testlogin', function (Request $request) {
    echo 'hihi';
})->middleware('auth.user');

//ADMIN LOGIN
Route::get('admin/login', [login::class, 'adminLoginIndex'])->name('admin.login');
Route::post('admin/login', [login::class, 'authAdmin'])->name('admin.login.auth');
Route::get('admin/logout', [login::class, 'adminLogout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::post('/ckeditorupload', [ad::class, 'ckEditorUpload'])->name('ckEditorUpload');
    Route::get('/', [ad::class, 'dashboardIndex'])->name('admin.dashboard');
    Route::prefix('/category')->group(function () {
        Route::get('/', [ad::class, 'categoryIndex'])->name('admin.category');
        Route::get('/create', [ad::class, 'createCategory'])->name('admin.category.create');
        Route::get('/read', [ad::class, 'readCategory'])->name('admin.category.read');
        Route::get('/readsigle', [ad::class, 'readSingleCategory'])->name('admin.category.readsingle');
        Route::get('/update', [ad::class, 'updateCategory'])->name('admin.category.update');
        Route::get('/delete', [ad::class, 'deleteCategory'])->name('admin.category.delete');
    });
    Route::prefix('/brand')->group(function () {
        Route::get('/', [ad::class, 'brandIndex'])->name('admin.brand');
        Route::post('/create', [ad::class, 'createBrand'])->name('admin.brand.create');
        Route::post('/update', [ad::class, 'updateBrand'])->name('admin.brand.update');
        Route::get('/delete', [ad::class, 'deleteBrand'])->name('admin.brand.delete');
        Route::get('/read', [ad::class, 'readBrand'])->name('admin.brand.read');
    });
    Route::prefix('/product')->group(function () {
        Route::get('/', [ad::class, 'productIndex'])->name('admin.product');
        Route::post('/create', [ad::class, 'createProduct'])->name('admin.product.create');
        Route::post('/update', [ad::class, 'updateProduct'])->name('admin.product.update');
        Route::get('/delete', [ad::class, 'deleteProduct'])->name('admin.product.delete');
    });
    Route::prefix('/cmscategory')->group(function () {
        Route::get('/', [ad::class, 'cmscategoryIndex'])->name('admin.cmscategory');
        Route::get('/create', [ad::class, 'createCmsCategory'])->name('admin.cmscategory.create');
        Route::get('/update', [ad::class, 'updateCmsCategory'])->name('admin.cmscategory.update');
        Route::get('/delete', [ad::class, 'deleteCmsCategory'])->name('admin.cmscategory.delete');
    });
    Route::prefix('/cms')->group(function () {
        Route::get('/', [ad::class, 'cmsIndex'])->name('admin.cms');
        Route::post('/create', [ad::class, 'createCms'])->name('admin.cms.create');
        Route::post('/update', [ad::class, 'updateCms'])->name('admin.cms.update');
        Route::get('/delete', [ad::class, 'deleteCms'])->name('admin.cms.delete');
    });
    Route::prefix('/adminman')->group(function () {
        Route::get('/', [ad::class, 'adminManagerIndex'])->name('admin.adminman');
        Route::post('/update/role', [ad::class, 'adminUpdateRole'])->name('admin.adminman.updateRole');
        Route::post('/update/active', [ad::class, 'adminUpdateActive'])->name('admin.adminman.updateActive');
        Route::post('/update/create', [ad::class, 'adminCreate'])->name('admin.adminman.create');
    });
    Route::prefix('/userman')->group(function () {
        Route::get('/', [ad::class, 'userManagerIndex'])->name('admin.userman');
        Route::post('/update/active', [ad::class, 'userUpdateActive'])->name('admin.userman.updateActive');
        Route::post('/delete', [ad::class, 'userDelete'])->name('admin.userman.delete');
        // Route::post('/update/active', [ad::class, 'adminUpdateActive'])->name('admin.adminman.updateActive');
        // Route::post('/update/create', [ad::class, 'adminCreate'])->name('admin.adminman.create');
    });
    Route::prefix('/order')->group(function () {
        Route::get('/', [ad::class, 'orderIndex'])->name('admin.order');
        Route::get('/{OrderID}', [ad::class, 'orderDetailIndex'])->name('admin.order.detail');
        Route::get('/{OrderID}/approve/{Status}', [ad::class, 'orderApprove'])->name('admin.order.approve');
        Route::get('/{OrderID}/paid/{PaymentStatus}', [ad::class, 'orderPaid'])->name('admin.order.paid');
        Route::get('/invoice/{OrderID}', [ad::class, 'invoiceIndex'])->name('admin.order.invoice');
    });

    Route::prefix('/blogmanager')->middleware('auth.admin')->group(function () {
        Route::get('/' , [ad::class , 'getBlogPage'])->name('admin.blog.pages');
        Route::post('/addblog' , [ad::class , 'addBlogPage'])->name('admin.blog.post');
        Route::post('/updateblog' , [ad::class , 'updateBlogPage'])->name('admin.blog.update');
        Route::get('/removeblog' , [ad::class , 'removeBlogPage'])->name('admin.blog.remove');

    });

});

Route::post('/testupload', [ad::class, 'fileUpload2'])->name('upload');

//User Routes

Route::prefix('/')->group(function () {

    Route::get('/', [us::class, 'getIndex'])->name('user.index');
    Route::get('/carts', [us::class, 'getCarts'])->name('user.carts');
    Route::post('/carts', [us::class, 'addCarts'])->name('user.add.carts');
    Route::post('/rate', [us::class, 'rateProduct'])->name('rate.product')->middleware('auth.user');
    Route::get('/search/{name}', [us::class, 'search'])->name('user.search');
    // Route::get('/search/{name}/{filter}', [us::class, 'searchWithFilter'])->name('user.search.filter');
    Route::get('/carts/remove/{id}', [us::class, 'removeProductCarts'])->name('user.remove.carts');

    Route::get('/order', [us::class, 'getOrder'])->name('user.order.detail')->middleware('auth.user');
    Route::get('/order/submited', [us::class, 'submitOrder'])->name('user.submit.order')->middleware('auth.user');

    Route::get('/san-pham/{tensanpham}', [us::class, 'getProduct'])->name('user.product');
    Route::get('/gian-hang/{tendanhmuc}', [us::class, 'getCollection'])->name('user.collection');
    Route::get('/gian-hang/{tendanhmuc}/{filter}', [us::class, 'getCollectionWithFilter'])->name('user.collection.filter');
    Route::get('/blog', [us::class, 'getBlog'])->name('user.blog');
    Route::get('/blog/{slug}', [us::class, 'getBlogDetail'])->name('get.blog.content');
    Route::get('/about', [us::class, 'getAbout'])->name('user.about');
});

Route::get('/crawl', [us::class, 'petCityCrawler']);
Route::get('/test', [us::class, 'testSaveImage']);
Route::post('/crawl', [us::class, 'petCityCrawlerHandle'])->name('crawl.post');

Route::prefix('/ajax')->group(function () {
    Route::get('/product', [us::class, 'getProductAjax'])->name('ajax.product');
    Route::get('/carts', [us::class, 'changeCartsAjax'])->name('ajax.carts');
});

Route::get('/carts/remove/{id}', [us::class, 'removeProductCarts'])->name('user.remove.carts');
Route::prefix('/user')->middleware('auth.user')->group(function () {
    Route::get('/favorite', [us::class, 'profileFavorite'])->name('user.favorite');
    Route::get('/profile', [us::class, 'profileSettings'])->name('user.settings');
    Route::post('/profile', [us::class, 'updateProfileSettings'])->name('user.update.settings');
    Route::get('/delivery', [us::class, 'profileDelivery'])->name('user.delivery');
});
