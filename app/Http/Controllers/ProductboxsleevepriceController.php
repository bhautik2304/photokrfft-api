<?php

namespace App\Http\Controllers;

use App\Models\productboxsleeve;
use App\Models\productboxsleeveprice;
use Illuminate\Http\Request;

class ProductboxsleevepriceController extends Controller
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
        $productboxsleeve = new productboxsleeveprice();
        $productboxsleeve->productboxsleeve_id = $request->parentid;
        $productboxsleeve->countryzone_id = $request->countryzone_id;
        $productboxsleeve->price = $request->price;
        $productboxsleeve->save();

        return response(["msg"=>"Product Box & Sleeve Price Save Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productboxsleeveprice  $productboxsleeveprice
     * @return \Illuminate\Http\Response
     */
    public function show(productboxsleeveprice $productboxsleeveprice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productboxsleeveprice  $productboxsleeveprice
     * @return \Illuminate\Http\Response
     */
    public function edit(productboxsleeveprice $productboxsleeveprice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productboxsleeveprice  $productboxsleeveprice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productboxsleeveprice $productboxsleeveprices, $id)
    {
        //
        $productboxsleeveprices->find($id)->update(["price" => $request->price]);

        return response(["msg" => "Product Box & Sleeve Price Save Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productboxsleeveprice  $productboxsleeveprice
     * @return \Illuminate\Http\Response
     */
    public function destroy(productboxsleeveprice $productboxsleeveprice)
    {
        //
    }
}
