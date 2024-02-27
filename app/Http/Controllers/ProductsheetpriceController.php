<?php

namespace App\Http\Controllers;

use App\Models\productsheetprice;
use Illuminate\Http\Request;

class ProductsheetpriceController extends Controller
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
        $sheetPrices = new productsheetprice();
        $sheetPrices->productsheet_id = $request->parentid;
        $sheetPrices->countryzone_id = $request->countryzone_id;
        $sheetPrices->price = $request->price;
        $sheetPrices->save();

        return response(["msg"=>"Product Sheet Price Save Successfully","code"=>200],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productsheetprice  $productsheetprice
     * @return \Illuminate\Http\Response
     */
    public function show(productsheetprice $productsheetprice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productsheetprice  $productsheetprice
     * @return \Illuminate\Http\Response
     */
    public function edit(productsheetprice $productsheetprice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productsheetprice  $productsheetprice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productsheetprice $productsheetprice,$id)
    {
        //
        $productsheetprice->find($id)->update([
            "price"=>$request->price
        ]);

        return response(["msg"=>"Product Sheet Price Update Successfully","code"=>200],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productsheetprice  $productsheetprice
     * @return \Illuminate\Http\Response
     */
    public function destroy(productsheetprice $productsheetprice)
    {
        //
    }
}
