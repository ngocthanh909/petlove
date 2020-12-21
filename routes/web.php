<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as ad;
use App\Http\Controllers\LoginController as login;

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
Route::get('/', [ad::class, 'index']);
Route::get('/auth/redirect', [login::class, 'redirect'])->name('login.facebook');
Route::get('/auth/callback', [login::class, 'callback']);

Route::get('admin/login', [login::class, 'adminLoginIndex'])->name('admin.login');
Route::post('admin/login', [login::class, 'authAdmin'])->name('admin.login.auth');
Route::get('admin/logout', [login::class, 'adminLogout'])->name('admin.logout');

Route::prefix('admin')->middleware('adminAuth')->group(function () {
    // Master Layout
    Route::get('/', [ad::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/1', [ad::class, 'index'])->name('admin.product');
    Route::get('/2', [ad::class, 'index'])->name('admin.brand');
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

});


Route::post('/testupload', [ad::class, 'fileUpload2'])->name('upload');