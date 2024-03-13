<?php

// use App\Events\newcostomerrequist;
use App\Models\productSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authModule\authtication;
use App\Http\Controllers\{AdminuserController, OrderController, ProductAlbumCopyPriceController, BoxsleeveController, BoxsleeveupgradeController, ColorController, CostomerController, CostomerrequistController, CountryzoneController, CoversController, CoversupgradesController, OrientationController, PaperController, PrintingpriceController, ProductboxsleeveController, ProductboxsleevepriceController, ProductcolorsController, ProductController, ProductcoversController, ProductCoversPriceController, ProductcoversupgradesController, ProductorientationController, ProductpapperController, ProductpapperpriceController, ProductsheetController, ProductsheetpriceController, ProductSizeController, SheetController, SizeController, StudioController};
use App\Models\costomer;
use App\Models\order;

/*
 * |--------------------------------------------------------------------------
 * | API Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register API routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | is assigned the "api" middleware group. Enjoy building your API!
 * |
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// admin auth routes
Route::Post('auth/login', [authtication::class, 'login']);
Route::Post('auth/otpveryfi', [authtication::class, 'otpvery']);
Route::Post('auth/session', [authtication::class, 'session']);

//customer auth routes
Route::Post('auth/costomer/login', [authtication::class, 'costomerlogin']);
Route::Post('auth/costomer/token', [authtication::class, 'tokenVerify']);
Route::Post('auth/costomer/forget-password', [authtication::class, 'forgetPasswordReq']);
Route::Post('auth/costomer/forget-password/check-otp', [authtication::class, 'checkOtp']);
Route::Post('auth/costomer/forget-password/set-password', [authtication::class, 'setPassword']);

Route::apiResource('adminusers',AdminuserController::class);


Route::apiResource('costomer', CostomerController::class);
Route::post('costomer/approve/{id}', [CostomerController::class, 'aprovedReq']);
Route::post('costomer/status/{id}', [CostomerController::class, 'statusUpdate']);
Route::post('costomer/password/{id}', [CostomerController::class, 'passwordUpdate']);
Route::post('costomer/zoneupdate/{id}', [CostomerController::class, 'zoneUpdate']);
Route::post('costomer/change-avtar/{id}', [CostomerController::class, 'changeAvatar']);
Route::post('costomer/fetch', [CostomerController::class, 'show']);
Route::post('costomer/discount-update/{id}', [CostomerController::class, 'changeDiscount']);


Route::apiResource('product', ProductController::class);
Route::apiResource('product/productalbumcopyprice', ProductAlbumCopyPriceController::class);
Route::apiResource('product/printigprice', PrintingpriceController::class);
Route::apiResource('countryzone', CountryzoneController::class);
Route::apiResource('orientation', OrientationController::class);
Route::apiResource('Size', SizeController::class);
Route::apiResource('paper', PaperController::class);
Route::apiResource('sheet', SheetController::class);
Route::apiResource('covers', CoversController::class);
Route::apiResource('coversupgrades', CoversupgradesController::class);
Route::apiResource('colors', ColorController::class);
Route::apiResource('boxsleeve', BoxsleeveController::class);
Route::apiResource('boxsleeveupgrades', BoxsleeveupgradeController::class);

// resource update routes
Route::post('product/update/{id}', [ProductController::class, 'update']);
Route::post('orientation/update/{id}', [OrientationController::class, 'update']);
Route::post('Size/update/{id}', [SizeController::class, 'update']);
Route::post('paper/update/{id}', [PaperController::class, 'update']);
Route::post('sheet/update/{id}', [SheetController::class, 'update']);
Route::post('covers/update/{id}', [CoversController::class, 'update']);
Route::post('coversupgrades/update/{id}', [CoversupgradesController::class, 'update']);
Route::post('colors/update/{id}', [ColorController::class, 'update']);
Route::post('boxsleeve/update/{id}', [BoxsleeveController::class, 'update']);
Route::post('countryzone/update/{id}', [CountryzoneController::class, 'update']);

Route::apiResource('product/productsize', ProductSizeController::class);
Route::apiResource('product/productorientation', ProductorientationController::class);
Route::apiResource('product/sheet', ProductsheetController::class);
Route::apiResource('product/productshetprice', ProductsheetpriceController::class);
Route::apiResource('product/productpaper', ProductpapperController::class);
Route::apiResource('product/productcover', ProductcoversController::class);
Route::apiResource('product/productcoverprice', ProductCoversPriceController::class);
Route::apiResource('product/productboxsleeve', ProductboxsleeveController::class);
Route::apiResource('product/productboxsleeveprice', ProductboxsleevepriceController::class);

// Route::post('product/create/{id}', [ProductController::class, 'createProductResource']);

// order routes
Route::apiResource('order', OrderController::class);
Route::post('order/user_order', [OrderController::class, 'show']);
Route::post('order/status/{id}', [OrderController::class, 'statusUpdate']);
Route::post('order/uploadfile', [OrderController::class, 'orderFileSubmit']);
Route::post('order/status/{id}/payment', [OrderController::class, 'PaymentstatusUpdate']);
Route::post('order/delivery/{id}', [OrderController::class, 'deliveryPartnerUpdate']);


// Route::any('test', function (Request $request) {
//     // return $request;
//     $order = order::where('order_no', $request->order_no)->first();

//     $mail = new newOrderUpdate($order);

//     return $mail->markdown('mail.orders.new-order-update');
//     dd($order->toArray());
// });
Route::any('/phpinfo', function (Request $request) {
    // return $request;
    dd(phpinfo());
});

/*
 * Route::apiResource('productorientation', ProductorientationController::class);
 * Route::apiResource('productSize', ProductSizeController::class);
 * Route::apiResource('productsheet', ProductsheetController::class);
 * Route::apiResource('productcovers', ProductcoversController::class);
 * Route::apiResource('productcoversupgrades', ProductcoversupgradesController::class);
 * Route::apiResource('productcolors', ProductcolorsController::class);
 * Route::apiResource('productboxsleeve', ProductboxsleeveController::class);
 * Route::apiResource('productsheetprice', ProductsheetController::class);
 * Route::apiResource('productpapperprice', ProductpapperpriceController::class);
 * Route::apiResource('productboxsleeveprice', ProductboxsleevepriceController::class);
 *
 * Route::apiResource('user',AdminuserController::class);
 * Route::apiResource('studio',StudioController::class);
 */
