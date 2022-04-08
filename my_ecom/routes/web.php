<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CupenController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;

use GuzzleHttp\Middleware;

/*
|---------------------------------------------------------------------------
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
Route::get('/admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['Middleware'=>'admin_auth'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/category',[CategoryController::class,'index']);
    Route::get('/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('/admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete']);

    //cupen
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/cupen',[CupenController::class,'index']);
    Route::get('/cupen/manage_cupen',[CupenController::class,'manage_cupen']);
    Route::get('/cupen/manage_cupen/{id}',[CupenController::class,'manage_cupen']);
    Route::post('/admin/cupen/manage_cupen_process',[CupenController::class,'manage_cupen_process'])->name('cupen.manage_cupen_process');
    Route::get('/admin/cupen/delete/{id}',[CupenController::class,'delete']);

    //size
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/size',[SizeController::class,'index']);
    Route::get('/size/manage_size',[SizeController::class,'manage_size']);
    Route::get('/size/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('/admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('/admin/size/delete/{id}',[SizeController::class,'delete']);

     //color
     Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
     Route::get('/admin/color',[ColorController::class,'index']);
     Route::get('/color/manage_color',[ColorController::class,'manage_color']);
     Route::get('/color/manage_color/{id}',[ColorController::class,'manage_color']);
     Route::post('/admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
     Route::get('/admin/color/delete/{id}',[ColorController::class,'delete']);


     //product
     Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
     Route::get('/admin/product',[ProductController::class,'index']);
     Route::get('/product/manage_product',[ProductController::class,'manage_product']);
     Route::get('/product/manage_product/{id}',[ProductController::class,'manage_product']);
     Route::post('/admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
     Route::get('/admin/product/delete/{id}',[ProductController::class,'delete']);




    Route::get('/admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Successfully');
        return redirect('admin');
    });
});

