<?php

namespace App\Http\Controllers;

use App\Models\productcoverprice;
use Illuminate\Http\Request;

class ProductCoversPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $productcoverprice = new productcoverprice;
        $productcoverprice->productcover_id= $request->parentid;
        $productcoverprice->countryzone_id= $request->countryzone_id;
        $productcoverprice->price= $request->price;
        $productcoverprice->save();

        return response([
            "msg"=>"Save Product Cover Price"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productcoverprice  $productcoverprice
     * @return \Illuminate\Http\Response
     */
    public function show(productcoverprice $productcoverprice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productcoverprice  $productcoverprice
     * @return \Illuminate\Http\Response
     */
    public function edit(productcoverprice $productcoverprice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productcoverprice  $productcoverprice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productcoverprice $productcoverprices,$id)
    {
        //
        $productcoverprices->find($id)->update([
            "price"=>$request->price
        ]);

        return response(["msg"=>"Product Cover Price Updated"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productcoverprice  $productcoverprice
     * @return \Illuminate\Http\Response
     */
    public function destroy(productcoverprice $productcoverprice)
    {
        //
    }
}
