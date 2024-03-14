<?php

use App\Http\Controllers\admin\AdminBrandController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminSubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Authcontroller;
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
//admin

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[AdminDashboardController::class,'index']);

    Route::get('admin/list',[AdminController::class,'index']);
    Route::get('admin/create',[AdminController::class,'create']);
    Route::post('admin/create',[AdminController::class,'store']);
    Route::get('admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/delete/{id}', [AdminController::class, 'destroy']);
    //Category
    Route::get('admin/category',[AdminCategoryController::class,'index']);
    Route::get('admin/category/create',[AdminCategoryController::class,'create']);
    Route::post('admin/category/create',[AdminCategoryController::class,'store']);
    Route::get('admin/category/edit/{id}',[AdminCategoryController::class,'edit']);
    Route::post('admin/category/edit/{id}', [AdminCategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [AdminCategoryController::class, 'destroy']);
    //SubCategory
    Route::get('admin/sub_category',[AdminSubCategoryController::class,'index']);
    Route::get('admin/sub_category/create',[AdminSubCategoryController::class,'create']);
    Route::post('admin/sub_category/create',[AdminSubCategoryController::class,'store']);
    Route::get('admin/sub_category/edit/{id}',[AdminSubCategoryController::class,'edit']);
    Route::post('admin/sub_category/edit/{id}', [AdminSubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [AdminSubCategoryController::class, 'destroy']);

    Route::get('admin/brand',[AdminBrandController::class,'index']);
    Route::get('admin/brand/create',[AdminBrandController::class,'create']);
    Route::post('admin/brand/create',[AdminBrandController::class,'store']);
    Route::get('admin/brand/edit/{id}',[AdminBrandController::class,'edit']);
    Route::post('admin/brand/edit/{id}', [AdminBrandController::class, 'update']);
    Route::get('admin/brand/delete/{id}', [AdminBrandController::class, 'destroy']);


});
Route::get('admin',[AuthController::class,'login_admin']);
Route::post('admin',[AuthController::class,'auth_login_admin']);
Route::get('admin/logout',[AuthController::class,'logout_admin']);



Route::get('/', function () {
    return view('welcome');
});
