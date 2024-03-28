<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productsheet;
use App\Models\productsheetprice;

class ProductsheetController extends Controller
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

        $productsheet = new productsheet;
        $productsheet->product_size_id = $request->product_size_id;
        $productsheet->sheet_id = $request->sheet_id;
        $productsheet->save();

        return response(["msg" => "Product Sheet add"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productsheet  $productsheet
     * @return \Illuminate\Http\Response
     */
    public function show(productsheet $productsheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productsheet  $productsheet
     * @return \Illuminate\Http\Response
     */
    public function edit(productsheet $productsheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productsheet  $productsheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productsheet $productsheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productsheet  $productsheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(productsheet $productsheet, $id)
    {
        //
        $productsheet->destroy($id);
        return success("Deleted Success");
    }
}
