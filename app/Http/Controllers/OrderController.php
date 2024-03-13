<?php

namespace App\Http\Controllers;

use App\Events\neworder;
use App\Mail\orders\newOrderReceived;
use App\Mail\orders\newOrderUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\{order, ordercustomdetail, orderdata};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response([
            'orders' => order::all(),
            'message' => 'Retrieved successfully',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // return ;

        $orderData = json_decode($request->orderData);
        $number = rand(100000, 999999);
        $order = new order;
        $order->order_no = $number;
        $order->order_date = date('Y-m-d');
        $order->user_id = $orderData->user->id;
        $order->product_id = $orderData->product_id;
        $order->pritnig_price_type = $orderData->pritnig_price_type;
        $order->pritnig_price = $orderData->pritnig_price_value;
        $order->product_orientation_id = $orderData->productOrientation;
        $order->product_size_id = $orderData->productSize;
        $order->product_sheet_id = $orderData->productSheet;
        $order->productpapers_id = $orderData->paperType;
        $order->page_qty = $orderData->page_qty;
        $order->zone_id = $orderData->zone->id;
        $order->productValue = $orderData->orderTotale;
        $order->shippingValue = $orderData->zone->shipingcharge;
        
        $order->productcovers_id = $orderData->productcover;
        $order->cover_type = $orderData->coverType;
        $order->coversupgrades_id = $orderData->productcoveroption;
        $order->coverupgradecolors_id = $orderData->productcovercolor;
        
        $order->boxsleeve_id = $orderData->productboxSleev;
        $order->boxsleeve_type = $orderData->productboxandsleeveType; //$orderData->productboxandsleeveType;
        $order->boxsleeveupgrades_id = $orderData->productboxandsleeveoption;
        $order->boxsleevecolors_id = $orderData->productboxandsleevecolor;
        
        $order->boxsleevefrontimg = storeFile($request, 'boxsleevefrontimg', '/order/boxsleevefront/');
        $order->boxsleevebacksideimg = storeFile($request, 'boxsleevebackimg', '/order/boxsleevefront/');
        $order->coverfrontimg = storeFile($request, 'coverfrontphoto', '/order/coverfront/');
        $order->coverbacksideimg = storeFile($request, 'coverbackphoto', '/order/coverfront/');
        
        $order->is_sample = $orderData->isSample;
        
        $order->album_book_copy_price = $orderData->photoBookCopyPrice;
        $order->is_album_book_copy = $orderData->isPhotoBookCopy;
        $order->album_book_copy_qty = $orderData->photoBookCopy;
        
        $order->delivery_address = $orderData->delivery_address;
        
        $order->sheetValue = $orderData->sheetValue;
        $order->paperValue = $orderData->paperValue;
        $order->coverValue = $orderData->coverValue;
        $order->boxSleeveValue = $orderData->boxSleeveValue;
        
        $order->discount = $orderData->discount;
        $order->order_total = (int)$orderData->orderTotale += (int)$orderData->zone->shipingcharge;
        $order->save();


        $ordercustomdetail = new ordercustomdetail;
        $ordercustomdetail->order_id = $order->id;
        $ordercustomdetail->event_type = $orderData->orderDetaild->eventType;
        $ordercustomdetail->event_name = $orderData->orderDetaild->eventName;
        $ordercustomdetail->event_date = $orderData->orderDetaild->eventDate;
        $ordercustomdetail->customizeMessage = $orderData->orderDetaild->costumizeMessage;
        $ordercustomdetail->Imprinting = $orderData->orderDetaild->printing;
        $ordercustomdetail->save();

        $msg = "New order received from Customer: " . $orderData->user->name . "! Order ID: " . $number . ", Amount: " . $orderData->zone->currency_sign . " " . $order->order_total . "!";

        // Mail::to()->send(new newOrderReceived());

        event(new neworder($msg));

        return response([
            'order' => $order,
            'order_id' => $order->order_no,
            'message' => 'Order created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, order $order)
    {
        //
        $ordersData = $order->where('user_id', $req->user_id)->get();

        return response([
            "data" => $ordersData,
            "code" => 200
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }

    public function statusUpdate(Request $request, $id)
    {
        $order = order::find($id);
        $order->update([
            "order_status" => $request->status
        ]);
        // dd($order->costomer->email);

        // Mail::to($order->costomer->email)->send(new newOrderUpdate());

        return response([
            'order' => $order,
            'message' => 'Order status updated successfully',
        ]);
    }

    public function PaymentstatusUpdate(Request $request, $id)
    {
        $order = order::find($id);

        $order->update([
            "payment_status" => $request->status
        ]);

        // Mail::to($order->costomer->email)->send(new newOrderUpdate());

        return response([
            'order' => $order,
            'message' => 'Order payment status updated successfully',
        ]);
    }

    public function orderFileSubmit(Request $req, orderdata $orderdata, order $order)
    {

        $orderId = $order->where('order_no', $req->orderNo)->first()->id;
        if ($req->sourceType == 'Zip File') {
            # code...
            $orderdata = new orderdata;
            $orderdata->order_id = $orderId;
            $orderdata->sourcetype = $req->sourceType;
            $orderdata->source_link = storeFile($req, 'photos_file', '/order/photos/');
            $orderdata->save();
        } else {
            # code...
            $orderdata = new orderdata;
            $orderdata->order_id = $orderId;
            $orderdata->sourcetype = $req->sourceType;
            $orderdata->source_link = $req->photos_url;
            $orderdata->save();
        }
        if ($req->sourceType == 'Zip File') {
            return response([
                "msg" => "Your File Successfully Store",
                "code" => 200
            ], 200);
        } else {
            return response([
                "msg" => "Your File Url Successfully Store. pls provide to access this email accont",
                "code" => 200
            ], 200);
        }
    }
}
