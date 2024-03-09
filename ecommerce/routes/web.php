<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
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
});
Route::get('admin',[AuthController::class,'login_admin']);
Route::post('admin',[AuthController::class,'auth_login_admin']);
Route::get('admin/logout',[AuthController::class,'logout_admin']);



Route::get('/', function () {
    return view('welcome');
});
