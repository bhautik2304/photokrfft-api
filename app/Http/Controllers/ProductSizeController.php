<?php

namespace App\Http\Controllers;

use App\Models\productSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
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

        $productsize = new productSize();
        $productsize->productorientation_id = $request->productorientation_id;
        $productsize->size_id = $request->size_id;
        $productsize->save();

        return response(["msg" => "Product Size Add Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function show(productSize $productSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function edit(productSize $productSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productSize $productSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(productSize $productSize)
    {
        //
    }
}
