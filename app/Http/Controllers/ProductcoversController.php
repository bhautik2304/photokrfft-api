<?php

namespace App\Http\Controllers;

use App\Models\productcovers;
use Illuminate\Http\Request;

class ProductcoversController extends Controller
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

        $productcover = new productcovers();
        $productcover->product_size_id = $request->product_size_id;
        $productcover->cover_id = $request->cover_id;
        $productcover->save();

        return response(["msg" => "Product Cover Add Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productcovers  $productcovers
     * @return \Illuminate\Http\Response
     */
    public function show(productcovers $productcovers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productcovers  $productcovers
     * @return \Illuminate\Http\Response
     */
    public function edit(productcovers $productcovers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productcovers  $productcovers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productcovers $productcovers, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productcovers  $productcovers
     * @return \Illuminate\Http\Response
     */
    public function destroy(productcovers $productcove, $id)
    {
        //
        $productcove->destroy($id);
        return success("Delete Success Fully");
    }
}
