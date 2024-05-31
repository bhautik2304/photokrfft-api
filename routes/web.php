<?php

// use App\Service\Wahtsapp;
use App\Models\order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Mail\orders\newOrderReceived;
use App\Mail\orders\orderConfirmmation;
use Illuminate\Support\Facades\{Route};
use App\Http\Controllers\authModule\authtication;

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
    return response()->redirectTo("https://photokrafft.com");
});

Route::get('emailveryfy/{token}', [authtication::class, 'adminEmailVerifications'])->name('emailveryfy');
Route::get('customer/emailveryfy/{token}', [authtication::class, 'customerEmailVerifications'])->name('customeremailveryfy');
Route::get('customer/whatsappverify/{token}', [authtication::class, 'customerWhatsappverifyVerifications']);



Route::get('/xyz/test/', function () {
    // $phoneNumber = 916358006532;

    // $Welcome_message = [
    //     "messaging_product" => "whatsapp",
    //     "to" => $phoneNumber,
    //     "type" => "template",
    //     "template" => [
    //         "name" => "user_verification_wa",
    //         "language" => [
    //             "code" => "en"
    //         ],
    //         "components" => [
    //             [
    //                 "type" => "body",
    //                 "parameters" => [
    //                     [
    //                         "type" => "text",
    //                         "text" => "https://api.photokrafft.com/customer/whatsappverify/ssfsdfgdgg"
    //                     ]
    //                 ]
    //             ],
    //             [
    //                 "type" => "button",
    //                 "sub_type" => "url",
    //                 "index" => 0,
    //                 "parameters" => [
    //                     [
    //                         "type" => "text",
    //                         "text" => "gfdgfdgf"
    //                     ]
    //                 ]
    //             ]
    //         ]
    //     ]
    // ];

    // // send($Welcome_message);

    // dd(send($Welcome_message));
    // View::make('mail.orders.order-confirmmation',)->render();
    // (new orderConfirmmation(order::find(26)->first()))->render();
    // dd(order::find(26)->first()->toArray()['countryzone']['currency_sign']);
    // Mail::to("dndtecnosol@gmail.com")->send(new orderConfirmmation(order::where('order_no', 921304)->first()));
    // try {
    //     //code...
    //     return "success";
    // } catch (\Throwable $th) {
    //     //throw $th;
    //     return "fail";
    // }
    // response()->redirectTo("https://photokrafft.com");
    return response()->json(["msg" => "notest"]);
});
