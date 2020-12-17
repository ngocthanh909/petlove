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

Route::get('/', function () {
    return view('welcome');
});
Route::view('layouts', 'admin.layouts.layout');

Route::get('test', [ad::class, 'readProduct']);

Route::prefix('admin')->group(function () {
    // CK Editor Upload adapter
    Route::post('/upload', [ad::class, 'uploadProductDescription']);
    // Root
    // Danh mục sp
    Route::get('/danhmuc', [ad::class, 'category'])->name('quanlydanhmuc');
    Route::get('/danhmuc/them', [ad::class, 'createCategory'])->name('themdanhmuc');
    Route::get('/danhmuc/sua', [ad::class, 'updateCategory'])->name('suadanhmuc');
    Route::get('/danhmuc/xoa', [ad::class, 'deleteCategory'])->name('xoadanhmuc');
    // Nhãn hàng
    Route::get('/nhanhang', [ad::class, 'brand'])->name('quanlynhanhang');
    Route::get('/nhanhang/them', [ad::class, 'createBrand'])->name('themnhanhang');
    Route::get('/nhanhang/sua', [ad::class, 'updateBrand'])->name('suanhanhang');
    Route::get('/nhanhang/xoa', [ad::class, 'deleteBrand'])->name('xoanhanhang');
    // Nhãn hàng
    Route::get('/sanpham', [ad::class, 'product'])->name('quanlysanpham');
    Route::get('/sannpham/listsanpham', [ad::class, 'readproduct'])->name('danhsachsanpham');
});
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

    //hmmm