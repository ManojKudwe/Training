<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CouponController;
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

Route::get('/', function () {
    return view('welcome');
});



//Route::resource('admin/posts', 'App\\Http\\Controllers\\Admin\PostsController');
//Route::resource('admin/posts', 'App\\Http\\Controllers\\Admin\PostsController');

Route::get('/eshopper',[CustomerController::class,'index']);
Route::post('/eshopper/save',[CustomerController::class,'csave']);
Route::post('/eshopper/check',[CustomerController::class,'ccheck']);
Route::get('/eshopper/logout',[CustomerController::class,'clogout']);
Route::get('/eshopper/login',[CustomerController::class,'clogin']);
Route::get('/eshopper/dashboard/{user}',[CustomerController::class,'cdashboard']);
Route::get('/eshopper/404',[CustomerController::class,'notfound']);
Route::get('/eshopper/blog/{user}',[CustomerController::class,'blog']);
Route::get('/eshopper/blog-single/{user}',[CustomerController::class,'blogsingle']);
Route::get('/eshopper/cart/{user}',[CustomerController::class,'cart']);
Route::get('/eshopper/checkout/{user}',[CustomerController::class,'checkout']);
Route::get('/eshopper/contact-us/{user}',[CustomerController::class,'contactus']);
Route::get('/eshopper/product/{user}',[CustomerController::class,'product']);
Route::get('/eshopper/shop/{user}',[CustomerController::class,'shop']);
Route::get('/eshopper/forgot-password',[CustomerController::class,'forgotpassword']);
Route::post('/eshopper/verify',[CustomerController::class,'verify']);
Route::get('/send-mail/{user}',[CustomerController::class,'sendEmail']);


Route::post('/save',[UserController::class,'save']);
Route::post('/check',[UserController::class,'check']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/login',[UserController::class,'login']);
Route::get('/register',[UserController::class,'register']);
Route::get('/dashboard/{user}',[UserController::class,'dashboard']);

Route::resource('users', UserController::class);
Route::resource('categorys',CategoryController::class);
Route::resource('products',ProductController::class);
Route::resource('banners',BannerController::class);
Route::resource('configs',ConfigController::class);
Route::resource('coupons',CouponController::class);




