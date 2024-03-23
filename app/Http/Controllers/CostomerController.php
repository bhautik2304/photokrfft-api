<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\auth\emailverify;
use App\Service\NotificationService;
use App\Mail\customer\newCustomerRequiest;
use Illuminate\Support\Facades\{Hash, Mail};

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

        $token=Str::random(32);

        $customer = new customer;
        $customer->name = $req->name;
        $customer->country_code = $req->country_code;
        $customer->phone_no = $req->phone_no;
        $customer->email = $req->email;
        $customer->password = Hash::make($req->password);

        $customer->address = $req->address;
        $customer->state = $req->state;
        $customer->country = $req->country;

        $customer->compunys_name = $req->compunys_name;
        $customer->compunys_logo = storeFile($req, 'compunys_logo', '/brand/logo/');
        $customer->social_link_1 = $req->social_link_1;
        $customer->social_link_2 = $req->social_link_2;
        
        $customer->access_token=$token;
        $customer->save();

        try {
            //code...
            Mail::to($customer->email)->send(new emailverify(route('customeremailveryfy',$token)));
        } catch (\Throwable $th) {
            //throw $th;
        }
        // Mail::to()->send(new newCustomerRequiest());

        $Notification =new NotificationService;
        $Notification->createNotification("$customer->name has sent a new customer request",config('notificationstatus.customer'));

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

        $customerreq->find($id)->first();
        // Mail::to($customerreq->email)->send(new customerUpdate($customerreq->name));

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
        $customers = $customer->find($id)->first();
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

        $customers = $customer->find($id)->first();

        return success("$customers->name zone Updated Successfully");
    }

    public function changeAvtar(Request $req, customer $customer, $id)
    {
        //
        $customer->find($id)->update([
            "avtar" => storeFile($req, 'avtar', '/customer/avtar/')
        ]);

        $customers = $customer->find($id)->first();

        return success("$customers->name Avtar Updated Successfully");
    }

    public function changeDiscount(Request $req, customer $customer, $id)
    {
        //
        $customer->find($id)->update([
            "discount" => $req->discounts
        ]);

        $customers = $customer->find($id)->first();

        return success("$customers->name Discount Updated Successfully");
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
