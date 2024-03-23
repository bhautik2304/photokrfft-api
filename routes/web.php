<?php

use App\Events\notification;
use App\Http\Controllers\authModule\authtication;
use App\Mail\auth\customeremailverify;
use App\Mail\auth\emailverify;
use App\Mail\auth\sendResetPasswordOtp;
use App\Mail\orders\deliveryNotification;
use App\Models\adminuser;
use App\Models\order;
use App\Service\NotificationService;
use Illuminate\Support\Facades\{Route, Mail};

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
    // // dd($orders);
    Mail::to("tifamtifins@gmail.com")->send(new emailverify("https://meet.google.com/"));
    return 0;
});

Route::get('emailveryfy/{token}',[authtication::class,'adminEmailVerifications'])->name('emailveryfy');
Route::get('customer/emailveryfy/{token}',[authtication::class,'customerEmailVerifications'])->name('customeremailveryfy');