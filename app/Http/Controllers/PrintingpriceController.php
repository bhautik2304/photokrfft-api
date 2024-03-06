<?php

namespace App\Http\Controllers;

use App\Models\printingprice;
use Illuminate\Http\Request;

class PrintingpriceController extends Controller
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
        $printingprice=new printingprice();
        $printingprice->product_id=$request->product_id;
        $printingprice->countryzone_id=$request->countryzone_id;
        $printingprice->price=$request->price;
        $printingprice->save();

        return response([
            "msg"=>"Printeing Price Added"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\printingprice  $printingprice
     * @return \Illuminate\Http\Response
     */
    public function show(printingprice $printingprice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\printingprice  $printingprice
     * @return \Illuminate\Http\Response
     */
    public function edit(printingprice $printingprice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\printingprice  $printingprice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, printingprice $printingprice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\printingprice  $printingprice
     * @return \Illuminate\Http\Response
     */
    public function destroy(printingprice $printingprice)
    {
        //
    }
}
