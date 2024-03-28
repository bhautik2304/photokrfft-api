<?php

namespace App\Http\Controllers;

use App\Models\productpaper;
use Illuminate\Http\Request;

class ProductpapperController extends Controller
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

        $product_paper = new productpaper();
        $product_paper->product_size_id = $request->product_size_id;
        $product_paper->paper_id =  $request->paper_id;
        $product_paper->save();

        return response(["msg" => "Product Paper Add Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productpaper  $productpaper
     * @return \Illuminate\Http\Response
     */
    public function show(productpaper $productpaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productpaper  $productpaper
     * @return \Illuminate\Http\Response
     */
    public function edit(productpaper $productpaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productpaper  $productpaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productpaper $productpaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productpaper  $productpaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(productpaper $productpape, $id)
    {
        //
        $productpape->destroy($id);
        return success("Deleted Successfully");
    }
}
