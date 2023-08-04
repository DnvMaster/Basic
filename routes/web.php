<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImagesController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function ()
{
    echo "This is home page";
});

Route::get('/about', function ()
{
    return view('about');
});

Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('category.add');

Route::get('/category/edit/{id}',[CategoryController::class,'editCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'updateCategory']);
Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory']);
Route::get('/category/restore/{id}',[CategoryController::class,'restoreCategory']);
Route::get('category/complete-removal/{id}',[CategoryController::class,'completeRemovalCategory']);

Route::get('/brands/all',[BrandController::class,'Brand'])->name('brands');
Route::post('/brand/add',[BrandController::class,'storeBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'editBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'updateBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand']);

Route::get('images/all',[ImagesController::class,'Images'])->name('images');
Route::post('/images/add',[ImagesController::class,'allImages'])->name('all-images');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    // return view('dashboard',compact('users'));
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[IndexController::class,'Logout'])->name('logout');
