<?php

namespace App\Http\Controllers;

use App\Models\sampleorderpermissionstatus;
use Illuminate\Http\Request;

class SampleOrderPermissionStatusController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sampleorderpermissionstatus  $sampleorderpermissionstatus
     * @return \Illuminate\Http\Response
     */
    public function show(sampleorderpermissionstatus $sampleorderpermissionstatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sampleorderpermissionstatus  $sampleorderpermissionstatus
     * @return \Illuminate\Http\Response
     */
    public function edit(sampleorderpermissionstatus $sampleorderpermissionstatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sampleorderpermissionstatus  $sampleorderpermissionstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sampleorderpermissionstatus $sampleorderpermissionstatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sampleorderpermissionstatus  $sampleorderpermissionstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        sampleorderpermissionstatus::destroy($id);
        return success("Activated Successfully");
    }
}
