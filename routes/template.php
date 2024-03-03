<?php

use Illuminate\Support\Facades\Route;

//Template Section
use App\Http\Controllers\Template\DashboardController;
use App\Http\Controllers\Template\HistoryController;
use App\Http\Controllers\Template\AdminLoginController;
use App\Http\Controllers\Template\AdminRegisterController;
use App\Http\Controllers\Template\MyWalletController;
use App\Http\Controllers\Template\SellController;
use App\Http\Controllers\Template\MarketPlaceController;
use App\Http\Controllers\Template\ActiveBidsController;
use App\Http\Controllers\Template\AllSavedController;
use App\Http\Controllers\Template\profileController;
use App\Http\Controllers\Template\SettingController;
use App\Http\Controllers\Template\NotificationController;
use App\Http\Controllers\Template\MessageController;
use App\Http\Controllers\Template\FlorgotPasswordController;
use App\Http\Controllers\Template\VerifyController;
use App\Http\Controllers\Template\MyCollectionController;
use App\Http\Controllers\Template\MarketPlaceDetailsController;
use App\Http\Controllers\Template\ProductUploadController;
//End Of Template Section

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

//Template Section
Route::get('/',[DashboardController::class,'index']);

Route::get('/load-login',[AdminLoginController::class,'index']);
Route::post('/admin-login',[AdminLoginController::class,'login']);

Route::get('/load-register',[AdminRegisterController::class,'index']);
Route::post('/register',[AdminRegisterController::class,'register']);

Route::get('/history',[HistoryController::class,'index']);


Route::get('/my-wallet',[MyWalletController::class,'index']);

Route::get('/sell',[SellController::class,'index']);


Route::get('/market-place',[MarketPlaceController::class,'index']);

Route::get('/active-bids',[ActiveBidsController::class,'index']);

Route::get('/all-saved',[AllSavedController::class,'index']);


Route::get('/my-profile',[profileController::class,'index']);

Route::get('/setting',[SettingController::class,'index']);

Route::get('/notification',[NotificationController::class,'index']);

Route::get('/message',[MessageController::class,'index']);

Route::get('/forgot-password',[FlorgotPasswordController::class,'index']);
Route::post('/find-password',[FlorgotPasswordController::class,'findPassword']);

Route::get('/verify',[VerifyController::class,'index']);
Route::post('/verification',[VerifyController::class,'verification']);

Route::get('/my-collection',[MyCollectionController::class,'index']);

Route::get('/market-place-details',[MarketPlaceDetailsController::class,'index']);

Route::get('/upload-product',[ProductUploadController::class,'index']);

Route::post('/change-password',[SettingController::class,'changePassword']);

//End Of Template Section