<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as ad;

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

Route::prefix('admin')->group(function () {
    // Master Layout
    Route::get('/', [ad::class, 'index']);
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
});


// Ck Finder
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');