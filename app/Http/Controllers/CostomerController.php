<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\auth\emailverify;
use App\Service\NotificationService;
use App\Mail\customer\customerUpdate;
use Illuminate\Support\Facades\{Hash, Log, Mail};
use PhpParser\Node\Stmt\TryCatch;

class costomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return success("Retrived All Customer", customer::all());
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
    public function store(Request $req)
    {
        //

        $users_email = customer::where('email', $req->email)->first();

        if ($users_email) {
            # code...
            return response(["msg" => "This email Id is already registered", "code" => 444], 202);
        }
        $users_mobile = customer::where('phone_no', $req->phone_no)->first();

        if ($users_mobile) {
            # code...
            return response(["msg" => "This mobile is already registered", "code" => 444], 202);
        }

        $token = Str::random(32);

        $customer = new customer;
        $customer->name = $req->name;
        $customer->country_code = $req->country_code;
        $customer->phone_no = $req->phone_no;
        $customer->whatsapp_no = $req->whatsapp_no;
        $customer->email = $req->email;
        $customer->password = Hash::make($req->password);

        $customer->address = $req->address;
        $customer->state = $req->state;
        $customer->country = $req->country;

        $customer->compunys_name = $req->compunys_name;
        $customer->compunys_logo = storeFile($req, 'compunys_logo', '/brand/logo/');
        $customer->social_link_1 = $req->social_link_1;
        $customer->social_link_2 = $req->social_link_2;

        $customer->access_token = $token;
        $customer->save();

        try {
            //code...
            Mail::to($customer->email)->send(new emailverify("https://api.photokrafft.com/customer/emailveryfy/$token"));
        } catch (\Throwable $th) {
            //throw $th;
        }
        try {
            //code...
            $Welcome_message = [
                "messaging_product" => "whatsapp",
                "to" => $customer->whatsapp_no,
                "type" => "template",
                "template" => [
                    "name" => "user_verification_wa",
                    "language" => [
                        "code" => "en"
                    ],
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                [
                                    "type" => "text",
                                    "text" => "https://api.photokrafft.com/customer/whatsappverify/$token"
                                ]
                            ]
                        ],
                        [
                            "type" => "button",
                            "sub_type" => "url",
                            "index" => 0,
                            "parameters" => [
                                [
                                    "type" => "text",
                                    "text" => $token
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            send($Welcome_message);
        } catch (\Throwable $th) {
            //throw $th;
        }
        // Mail::to()->send(new newCustomerRequiest());

        $Notification = new NotificationService;
        $Notification->createNotification("$customer->name has sent a new customer request", config('notificationstatus.customer'));

        return created("$customer->name You are Register Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function aprovedReq(customer $customerreq, $id)
    {
        //
        $customerreq->find($id)->update([
            "approved" => 1,
            "status" => true
        ]);

        $customer = $customerreq->where('id', $id)->first();

        try {
            Mail::to($customer->email)->send(new customerUpdate($customer->name));
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            $Welcome_message = [
                "messaging_product" => "whatsapp",
                "to" => $customer->whatsapp_no,
                "type" => "template",
                "template" => [
                    "name" => "welcome_user",
                    "language" => [
                        "code" => "en"
                    ],
                    "components" => [
                        [
                            "type" => "header",
                            "parameters" => [
                                [
                                    "type" => "image",
                                    "image" => [
                                        "link" => "https://basira.in/public/whatsappmedia.png"
                                    ]
                                ]
                            ]
                        ],
                        [
                            "type" => "body",
                            "parameters" => [
                                [
                                    "type" => "text",
                                    "text" => $customer->name
                                ]
                            ]
                        ]
                    ]
                ]
            ];
            $response = send($Welcome_message);
            Log::info("sms temp", [$response]);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return success("Approved");
    }

    public function show(Request $request, customer $customers)
    {
        //
        // return
        return success("Customer Is Authorised", $customers->where('token', $request->header('Authorization'))->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, customer $customerd, $id)
    {
        //
        $customerd->find($id)->update([
            "name" => $req->name,
            "phone_no" => $req->phone_no,
            "email" => $req->email,
            "state" => $req->state,
            "country" => $req->country,
            "address" => $req->address,
        ]);

        return success("customer Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer, $id)
    {
        //
        $customers = $customer->find($id);
        $customer->destroy($id);

        return success("$customers->name Deleted Successfully");
    }
    public function statusUpdate(Request $req, customer $customer, $id)
    {
        //
        $customers = $customer->find($id)->first();
        $customer->find($id)->update([
            "status" => $req->status
        ]);

        $status = $req->status ? "Activated" : "Deactivate";

        return success("$customers->name $status Successfully");
    }
    public function passwordUpdate(Request $req, customer $customer, $id)
    {
        //
        $customers = $customer->find($id)->update([
            "password" => Hash::make($req->password)
        ]);
        // $customer->destroy($id);

        return success("$customers Password Updated Successfully");
    }

    public function zoneUpdate(Request $req, customer $customer, $id)
    {
        //
        $customer->find($id)->update([
            "zone" => $req->zone
        ]);

        $customers = $customer->find($id);

        return success("$customers->name zone Updated Successfully");
    }

    public function changeAvtar(Request $req, customer $customer, $id)
    {
        //
        $customer->find($id)->update([
            "avtar" => storeFile($req, 'avtar', '/customer/avtar/')
        ]);

        $customers = $customer->find($id);

        return success("$customers->name Avtar Updated Successfully");
    }

    public function changeDiscount(Request $req, customer $customer, $id)
    {
        //
        $customer->find($id)->update([
            "discount" => $req->discounts
        ]);

        $customers = $customer->find($id);

        return success("$customers->name Discount Updated Successfully");
    }
    public function emailverifi(Request $req, customer $customer, $id)
    {
        //
        $customer->find($id)->update([
            "email_veryfi" => $req->status
        ]);

        $customers = $customer->find($id);

        return success("$customers->name Email Veryfi Successfully");
    }
    public function whatsappverify(Request $req, customer $customer, $id)
    {
        //
        $customer->where('id', $id)->update([
            "whatsapp_veryfi" => $req->status
        ]);

        $customers = $customer->find($id);

        return success("$customers->name Whatsapp Veryfi Updated");
    }
}

// {
// "name":"",
// "phone_no":"",
// "email":"",
// "password":"",
// "state":"",
// "country":"",
// "address":"",
// }
