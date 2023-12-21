<?php

use App\Http\Controllers\AdminController;
use Illuminate\Auth\Middleware\Authenticate;
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

Route::resource('/',\App\Http\Controllers\HomeController::class);
Route::get('chitiet/{id}',[\App\Http\Controllers\HomeController::class,'chitiet'])->name('chitiet');
Route::get('login',function (){
   return view('login');
});
Route::post('login','\App\Http\Controllers\UserController@login')->name('login');
Route::get('user-add',[\App\Http\Controllers\UserController::class,'create']);
Route::get('user/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('updateuser');
Route::delete('user/{id}',[\App\Http\Controllers\UserController::class,'destroy'])->name('deleteuser');
Route::resource('user',\App\Http\Controllers\UserController::class)->middleware('auth');
Route::get('profile',[\App\Http\Controllers\UserController::class,'profile']);
Route::get('logout',[\App\Http\Controllers\UserController::class,'logout']);

Route::resource('danhmuc',\App\Http\Controllers\DanhMucController::class)->middleware('auth');
Route::get('capnhatdanhmuc/{id}',[\App\Http\Controllers\DanhMucController::class,'edit'])->name('updatecat');
Route::get('them-danhmuc',[\App\Http\Controllers\DanhMucController::class,'create']);

Route::resource('loaidanhmuc',\App\Http\Controllers\LoaiDanhMucController::class)->middleware('auth');;
Route::resource('huyen',\App\Http\Controllers\HuyenController::class);
Route::resource('tinh',\App\Http\Controllers\TinhController::class);

Route::resource('chudautu',\App\Http\Controllers\ChuDauTuController::class)->middleware('auth');
Route::get('themchudautu',[\App\Http\Controllers\ChuDauTuController::class,'create']);
Route::get('capnhatchudautu/{id}',[\App\Http\Controllers\ChuDauTuController::class,'edit'])->name('capnhatchudautu');
Route::delete('chudautu/{id}',[\App\Http\Controllers\ChuDauTuController::class,'destroy'])->name('xoachudautu');

Route::resource('duan',\App\Http\Controllers\DuAnController::class)->middleware('auth');
Route::get('themduan',[\App\Http\Controllers\DuAnController::class,'create']);
Route::get('capnhatduan/{id}',[\App\Http\Controllers\DuAnController::class,'edit'])->name('capnhatduan');
Route::delete('duan/{id}',[\App\Http\Controllers\DuAnController::class,'destroy'])->name('xoóauan');

Route::resource('batdongsan',\App\Http\Controllers\BatDongSanController::class)->middleware('auth');;
Route::get('them-batdongsan',[\App\Http\Controllers\BatDongSanController::class,'create'])->middleware('auth');;
Route::get('capnhatbatdongsan/{id}',[\App\Http\Controllers\BatDongSanController::class,'edit'])->name('updatebds');

Route::get('search',[\App\Http\Controllers\SearchController::class,'search'])->name('search');


Route::get('about',function (){
    return view('about');
});
Route::get('blog',function (){
    return view('blog');
});
Route::get('blogsingle',function (){
    return view('blogsingle');
});
Route::get('services',function (){
    return view('services');
});
Route::get('contact',function (){
    return view('contact');
});
Route::get('properties',function (){
    $batdongsan=\App\Models\Batdongsan::all();
    return view('properties',compact('batdongsan'));
});


Route::get('/get-huyen/{tinhId}', [\App\Http\Controllers\LocationController::class, 'getHuyenByTinhId'])->name('get-huyen');
Route::get('/get-tinh-by-huyen/{huyenId}', [LocationController::class, 'getTinhByHuyenId'])->name('get-tinh-by-huyen');
Route::get('/get-tinh-by-huyen/{huyenId}', [LocationController::class, 'getTinhByHuyenId'])->name('get-tinh-by-huyen');
