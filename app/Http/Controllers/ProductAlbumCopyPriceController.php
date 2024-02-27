<?php

namespace App\Http\Controllers;

use App\Models\productalbumcopyprice;
use Illuminate\Http\Request;

class ProductAlbumCopyPriceController extends Controller
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

        $price = new productalbumcopyprice();
        $price->product_id = $request->productid;
        $price->countryzone_id = $request->countryzone_id;
        $price->price = $request->price;
        $price->save();

        return response(["msg" => "Album Copy Price Save successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productalbumcopyprice  $productalbumcopyprice
     * @return \Illuminate\Http\Response
     */
    public function show(productalbumcopyprice $productalbumcopyprice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productalbumcopyprice  $productalbumcopyprice
     * @return \Illuminate\Http\Response
     */
    public function edit(productalbumcopyprice $productalbumcopyprice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productalbumcopyprice  $productalbumcopyprice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productalbumcopyprice $productalbumcopyprices, $id)
    {
        //
        $productalbumcopyprices->find($id)->update(["price" => $request->price]);
        return response(["msg" => "Album Copy Price Save successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productalbumcopyprice  $productalbumcopyprice
     * @return \Illuminate\Http\Response
     */
    public function destroy(productalbumcopyprice $productalbumcopyprices)
    {
        //
    }
}
