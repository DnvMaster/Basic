<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
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

Route::get('/',[HomeController::class,'index'])->name('index');
# Page slider
Route::get('/sliders/all',[SliderController::class,'AllSliders'])->name('sliders');
Route::get('/sliders/add',[SliderController::class,'AddSliders'])->name('sliders.add');
Route::post('/sliders/store',[SliderController::class,'StoreSliders'])->name('sliders.store');
# Page about
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/about/all',[AboutController::class,'aboutAll'])->name('about.all');
Route::get('/about/add',[AboutController::class,'aboutAdd'])->name('about.add');
Route::get('/about/create',[AboutController::class,'aboutCreate'])->name('about.create');
Route::get('/about/edit/{id}',[AboutController::class,'aboutEdit']);
Route::get('/about/update/{id}',[AboutController::class,'aboutUpdate']);
Route::get('/about/delete/{id}',[AboutController::class,'aboutDelete']);
# Page service
Route::get('/service',[ServiceController::class,'service'])->name('service');
Route::get('/service/all',[ServiceController::class,'index'])->name('service.all');
Route::get('/service/add',[ServiceController::class,'serviceAdd'])->name('service.add');
Route::post('/service/create',[ServiceController::class,'serviceCreate'])->name('service.create');
Route::get('/service/edit/{id}',[ServiceController::class,'serviceEdit']);
Route::get('/service/update/{id}',[ServiceController::class,'serviceUpdate']);
Route::get('/service/delete/{id}',[ServiceController::class,'serviceDelete']);
# Page Portfolio
Route::get('/portfolio',[PortfolioController::class,'Portfolio'])->name('portfolio');
Route::get('/portfolio/all',[PortfolioController::class,'index'])->name('index');
Route::match(['get','post'],'/portfolio/store',[PortfolioController::class,'store'])->name('store');
Route::match(['get','post'],'/portfolio/create',[PortfolioController::class,'create'])->name('create');
Route::get('/portfolio/edit/{id}',[PortfolioController::class,'edit']);
Route::post('/portfolio/update/{id}',[PortfolioController::class,'update']);
Route::get('/portfolio/delete/{id}',[PortfolioController::class,'destroy']);
# Page Categories
Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('category.add');
Route::get('/category/edit/{id}',[CategoryController::class,'editCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'updateCategory']);
Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory']);
Route::get('/category/restore/{id}',[CategoryController::class,'restoreCategory']);
Route::get('category/complete-removal/{id}',[CategoryController::class,'completeRemovalCategory']);
# Page Brands
Route::get('/brand',[BrandController::class,'index']);
Route::get('/brands/all',[BrandController::class,'Brand'])->name('brands');
Route::post('/brand/add',[BrandController::class,'storeBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'editBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'updateBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand']);
# Page Contacts
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/admin/contact',[ContactController::class,'adminContact'])->name('admin.contact');
//Route::get('/admin/contact/message',[ContactController::class,'adminMessageContact'])->name('admin.contact.message');

Route::get('images/all',[ImagesController::class,'Images'])->name('images');
Route::post('/images/add',[ImagesController::class,'allImages'])->name('all-images');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    // return view('dashboard',compact('users'));
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[IndexController::class,'Logout'])->name('logout');
