<?php

namespace App\Http\Controllers;

use App\Models\costomer;
use Illuminate\Http\Request;
use App\Models\costomerrequist;
use App\Models\otpveryfication;
use App\Events\newcostomerrequist;
use App\Mail\customer\customerUpdate;
use App\Mail\customer\newCustomerRequiest;
use Illuminate\Support\Facades\{Hash, Mail};

class CostomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["costomer" => costomer::all()]);
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

        $users_email = costomer::where('email', $req->email)->first();

        if ($users_email) {
            # code...
            return response(["msg" => "This email Id is already registered", "code" => 444], 202);
        }
        $users_mobile = costomer::where('phone_no', $req->phone_no)->first();

        if ($users_mobile) {
            # code...
            return response(["msg" => "This mobile is already registered", "code" => 444], 202);
        }

        $costomer = new costomer;
        $costomer->name = $req->name;
        $costomer->phone_no = $req->phone_no;
        $costomer->email = $req->email;
        $costomer->password = Hash::make($req->password);

        $costomer->address = $req->address;
        $costomer->state = $req->state;
        $costomer->country = $req->country;

        $costomer->compunys_name = $req->compunys_name;
        $costomer->compunys_logo = storeFile($req, 'compunys_logo', '/brand/logo/');
        $costomer->social_link_1 = $req->social_link_1;
        $costomer->social_link_2 = $req->social_link_2;
        $costomer->save();

        // Mail::to()->send(new newCustomerRequiest());

        event(new newcostomerrequist("$costomer->name Send To Register Request"));

        return response(["msg" => "$costomer->name You are Register Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function aprovedReq(costomer $costomerreq, $id)
    {
        //
        $costomerreq->find($id)->update([
            "approved" => 1,
            "status" => true
        ]);

        $costomerreq->find($id)->first();
        // Mail::to($costomerreq->email)->send(new customerUpdate($costomerreq->name));

        return response(["msg" => "Approved", "code" => 200], 200);
    }

    public function show(Request $request, costomer $costomers)
    {
        //
        // return
        return response(["costomer" => $costomers->where('token', $request->header('Authorization'))->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function edit(costomer $costomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, costomer $costomerd, $id)
    {
        //
        $costomerd->find($id)->update([
            "name" => $req->name,
            "phone_no" => $req->phone_no,
            "email" => $req->email,
            "state" => $req->state,
            "country" => $req->country,
            "address" => $req->address,
        ]);

        return response(["msg" => "Costomer Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(costomer $costomer, $id)
    {
        //
        $costomers = $costomer->find($id)->first();
        // $costomer->destroy($id);

        return response(["$costomers Deleted Successfully"]);
    }
    public function statusUpdate(Request $req, costomer $costomer, $id)
    {
        //
        $costomers = $costomer->find($id)->first();
        $costomer->find($id)->update([
            "status" => $req->status
        ]);
          
        $status = $req->status ? "Activated" : "Deactivate";

        return response(["msg" => "$costomers->name $status Successfully", "code" => 200], 200);
    }
    public function passwordUpdate(Request $req, costomer $costomer, $id)
    {
        //
        $costomers = $costomer->find($id)->update([
            "password" => Hash::make($req->password)
        ]);
        // $costomer->destroy($id);

        return response(["$costomers Password Updated Successfully"]);
    }

    public function zoneUpdate(Request $req, costomer $costomer, $id)
    {
        //
        $costomer->find($id)->update([
            "zone" => $req->zone
        ]);

        $costomers = $costomer->find($id)->first();

        return response(["msg" => "$costomers->name zone Updated Successfully", "code" => 200]);
    }

    public function changeAvtar(Request $req, costomer $costomer, $id)
    {
        //
        $costomer->find($id)->update([
            "avtar" => storeFile($req, 'avtar', '/costomer/avtar/')
        ]);

        $costomers = $costomer->find($id)->first();

        return response(["msg" => "$costomers->name Avtar Updated Successfully", "code" => 200]);
    }

    public function changeDiscount(Request $req, costomer $costomer, $id)
    {
        //
        $costomer->find($id)->update([
            "discount" => $req->discounts
        ]);

        $costomers = $costomer->find($id)->first();

        return response(["msg" => "$costomers->name Discount Updated Successfully", "code" => 200]);
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
