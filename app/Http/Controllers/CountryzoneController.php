<?php

namespace App\Http\Controllers;

use App\Models\countryzone;
use Illuminate\Http\Request;

class CountryzoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return success('Retrieved successfully', countryzone::all());
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
        $countryzone = new countryzone();
        $countryzone->zonename     = $request->name;
        $countryzone->shipingcharge = $request->shipingcharge;
        $countryzone->currency_sign = $request->currency_sign;
        $countryzone->img = storeFile($request, 'img', '/img/countryzone/');
        $countryzone->save();

        return created('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\countryzone  $countryzone
     * @return \Illuminate\Http\Response
     */
    public function show(countryzone $countryzone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\countryzone  $countryzone
     * @return \Illuminate\Http\Response
     */
    public function edit(countryzone $countryzone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\countryzone  $countryzone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, countryzone $countryzone, $id)
    {
        //
        $res = countryzone::find($id)->update([
            'zonename' => $request->zonename,
            'shipingcharge' => $request->shipingcharge,
            'currency_sign' => $request->currency_sign,
        ]);

        // return $res;

        if ($request->hasFile('img')) {
            countryzone::find($id)->update([
                'img' => storeFile($request, 'img', '/img/countryzone/'),
            ]);
        }

        return created('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\countryzone  $countryzone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        countryzone::find($id)->delete();

        return success('Deleted successfully');
    }
}
