<?php

namespace App\Http\Controllers;

use App\Models\costomerrequist;
use Illuminate\Http\Request;

class CostomerrequistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["costomerreq" => costomerrequist::all()]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\costomerrequist  $costomerrequist
     * @return \Illuminate\Http\Response
     */
    public function show(costomerrequist $costomerrequist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\costomerrequist  $costomerrequist
     * @return \Illuminate\Http\Response
     */
    public function edit(costomerrequist $costomerrequist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\costomerrequist  $costomerrequist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, costomerrequist $costomerrequist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\costomerrequist  $costomerrequist
     * @return \Illuminate\Http\Response
     */
    public function destroy(costomerrequist $costomerrequist,$id)
    {
        //
        // $costomers = $costomerrequist->find($id)->first();
        $costomerrequist->destroy($id);

        return response(["Deleted Successfully"]);
    }
}
