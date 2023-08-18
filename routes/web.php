<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use \App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
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


Route::get('/home', function ()
{
    echo "This is home page";
});

Route::get('/sliders/all',[SliderController::class,'AllSliders'])->name('sliders');
Route::get('/sliders/add',[SliderController::class,'AddSliders'])->name('sliders.add');
Route::post('/sliders/store',[SliderController::class,'StoreSliders'])->name('sliders.store');

Route::get('home',[HomeController::class,'index']);
Route::get('/about/all',[AboutController::class,'index'])->name('about.all');
Route::get('/about/add',[AboutController::class,'aboutAdd'])->name('about.add');
Route::get('/about/create',[AboutController::class,'aboutCreate'])->name('about.create');
Route::get('/about/edit/{id}',[AboutController::class,'aboutEdit']);
Route::get('/about/update/{id}',[AboutController::class,'aboutUpdate']);
Route::get('/about/delete/{id}',[AboutController::class,'aboutDelete']);

Route::get('/service/all',[ServiceController::class,'index'])->name('service.all');
Route::get('/service/add',[ServiceController::class,'serviceAdd'])->name('service.add');
Route::post('/service/create',[ServiceController::class,'serviceCreate'])->name('service.create');
//Route::get('/service/edit/{id}',[ServiceController::class,'serviceEdit']);
//Route::get('/service/update/{id}',[ServiceController::class,'serviceUpdate']);
//Route::get('/service/delete/{id}',[ServiceController::class,'serviceDelete']);

Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('category.add');
Route::get('/category/edit/{id}',[CategoryController::class,'editCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'updateCategory']);
Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory']);
Route::get('/category/restore/{id}',[CategoryController::class,'restoreCategory']);
Route::get('category/complete-removal/{id}',[CategoryController::class,'completeRemovalCategory']);

Route::get('/',[BrandController::class,'index']);
Route::get('/brands/all',[BrandController::class,'Brand'])->name('brands');
Route::post('/brand/add',[BrandController::class,'storeBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'editBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'updateBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand']);

Route::get('/contact',[ContactController::class,'index'])->name('contact');

Route::get('images/all',[ImagesController::class,'Images'])->name('images');
Route::post('/images/add',[ImagesController::class,'allImages'])->name('all-images');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    // return view('dashboard',compact('users'));
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[IndexController::class,'Logout'])->name('logout');
