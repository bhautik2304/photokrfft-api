<?php

// use App\Events\newcostomerrequist;
use App\Models\productSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authModule\authtication;
use App\Http\Controllers\{AdminuserController, OrderController, ProductAlbumCopyPriceController, BoxsleeveController, BoxsleeveupgradeController, ColorController, CostomerController, CostomerrequistController, CountryzoneController, CoversController, CoversupgradesController, NotificationController, OrientationController, PaperController, PrintingpriceController, ProductboxsleeveController, ProductboxsleevepriceController, ProductcolorsController, ProductController, ProductcoversController, ProductCoversPriceController, ProductcoversupgradesController, ProductorientationController, ProductpapperController, ProductpapperpriceController, ProductsheetController, ProductsheetpriceController, ProductSizeController, SampleOrderPermissionStatusController, SheetController, SizeController, StudioController};
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
Route::prefix('auth')->group(function () {
    Route::Post('login', [authtication::class, 'login']);
    Route::Post('otpveryfi', [authtication::class, 'otpvery']);
    Route::Post('session', [authtication::class, 'session']);
});

//customer auth routes
Route::prefix('auth/costomer/')->group(function () {
    Route::Post('login', [authtication::class, 'customerlogin']);
    Route::Post('token', [authtication::class, 'tokenVerify']);
    Route::get('email/token', [authtication::class, 'emailVerify']);
    Route::Post('forget-password', [authtication::class, 'forgetPasswordReq']);
    Route::Post('forget-password/check-otp', [authtication::class, 'checkOtp']);
    Route::Post('forget-password/set-password', [authtication::class, 'setPassword']);
});


Route::apiResource('adminusers', AdminuserController::class);
Route::put('adminusers/update/{id}', [AdminuserController::class, 'update']);

Route::apiResource('costomer', CostomerController::class);
Route::prefix('costomer')->group(function () {
    Route::post('approve/{id}', [CostomerController::class, 'aprovedReq']);
    Route::post('emailverifi/{id}', [CostomerController::class, 'emailverifi']);
    Route::post('status/{id}', [CostomerController::class, 'statusUpdate']);
    Route::post('password/{id}', [CostomerController::class, 'passwordUpdate']);
    Route::post('zoneupdate/{id}', [CostomerController::class, 'zoneUpdate']);
    Route::post('change-avtar/{id}', [CostomerController::class, 'changeAvatar']);
    Route::post('fetch', [CostomerController::class, 'show']);
    Route::post('discount-update/{id}', [CostomerController::class, 'changeDiscount']);
});


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
Route::post('boxsleeveupgrades/update/{id}', [BoxsleeveupgradeController::class, 'update']);
Route::post('countryzone/update/{id}', [CountryzoneController::class, 'update']);

Route::prefix('product')->group(function () {
    Route::apiResource('productorientation', ProductorientationController::class);
    Route::apiResource('productsize', ProductSizeController::class);
    Route::apiResource('sheet', ProductsheetController::class);
    Route::apiResource('productshetprice', ProductsheetpriceController::class);
    Route::apiResource('productpaper', ProductpapperController::class);
    Route::apiResource('productcover', ProductcoversController::class);
    Route::apiResource('productcoverprice', ProductCoversPriceController::class);
    Route::apiResource('productboxsleeve', ProductboxsleeveController::class);
    Route::apiResource('productboxsleeveprice', ProductboxsleevepriceController::class);
});

// Route::post('product/create/{id}', [ProductController::class, 'createProductResource']);
Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'index']);
    Route::put('read', [NotificationController::class, 'update']);
    Route::delete('delete', [NotificationController::class, 'destroy']);
});

// order routes
Route::prefix('order')->group(function () {
    Route::apiResource('/', OrderController::class);
    Route::post('user_order', [OrderController::class, 'show']);
    Route::post('status/{id}', [OrderController::class, 'statusUpdate']);
    Route::post('uploadfile', [OrderController::class, 'upload']);
    Route::post('status/{id}/payment', [OrderController::class, 'PaymentstatusUpdate']);
    Route::post('delivery/{id}', [OrderController::class, 'deliveryPartnerUpdate']);
    Route::apiResource('sampleorderpermission', SampleOrderPermissionStatusController::class);
});


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
