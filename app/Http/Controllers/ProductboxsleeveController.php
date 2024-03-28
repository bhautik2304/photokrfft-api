<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productboxsleeve;
use App\Models\{productboxsleeveprice};

class ProductboxsleeveController extends Controller
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
        $productboxsleeve = new productboxsleeve;
        $productboxsleeve->product_size_id = $request->product_size_id;
        $productboxsleeve->boxsleeve_id = $request->boxsleeve_id;
        $productboxsleeve->save();

        return response(["msg" => "Product Sleev Add"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productboxsleeve  $productboxsleeve
     * @return \Illuminate\Http\Response
     */
    public function show(productboxsleeve $productboxsleeve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productboxsleeve  $productboxsleeve
     * @return \Illuminate\Http\Response
     */
    public function edit(productboxsleeve $productboxsleeve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productboxsleeve  $productboxsleeve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productboxsleeve $productboxsleeve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productboxsleeve  $productboxsleeve
     * @return \Illuminate\Http\Response
     */
    public function destroy(productboxsleeve $productboxsleev, $id)
    {
        //
        $productboxsleev->destroy($id);

        return success("Deleted Successfully");
    }
}
