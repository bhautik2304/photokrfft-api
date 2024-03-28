<?php

namespace App\Http\Controllers;

use App\Models\productorientation;
use Illuminate\Http\Request;

class ProductorientationController extends Controller
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
        $productorientation = new productorientation();
        $productorientation->product_id = $request->product_id;
        $productorientation->orientation_id = $request->orientation_id;
        $productorientation->save();

        return response(["msg" => "orientation Add Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productorientation  $productorientation
     * @return \Illuminate\Http\Response
     */
    public function show(productorientation $productorientation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productorientation  $productorientation
     * @return \Illuminate\Http\Response
     */
    public function edit(productorientation $productorientation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productorientation  $productorientation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productorientation $productorientation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productorientation  $productorientation
     * @return \Illuminate\Http\Response
     */
    public function destroy(productorientation $productorientati, $id)
    {
        //
        $productorientati->destroy($id);
        return success("Deleted Successfully");
    }
}
