<?php

namespace App\Http\Controllers;

use App\Models\coversupgradecolor;
use Illuminate\Http\Request;

class CoversupgradescolorController extends Controller
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
        if ($request->colorData) {
            foreach ($request->colorData as $color) {
                $boxslevecolor = new coversupgradecolor();
                $boxslevecolor->coversupgrade_id = $color['optionid'];
                $boxslevecolor->color_id = $color['id'];
                $boxslevecolor->save();
            }
            return created("Color Added Successfully");
        } else {
            return success("No data Found");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coversupgradecolor  $coversupgradecolor
     * @return \Illuminate\Http\Response
     */
    public function show(coversupgradecolor $coversupgradecolor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coversupgradecolor  $coversupgradecolor
     * @return \Illuminate\Http\Response
     */
    public function edit(coversupgradecolor $coversupgradecolor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coversupgradecolor  $coversupgradecolor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coversupgradecolor $coversupgradecolor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coversupgradecolor  $coversupgradecolor
     * @return \Illuminate\Http\Response
     */
    public function destroy(coversupgradecolor $coversupgradecolor, $id)
    {
        //
        $coversupgradecolor->find($id)->delete();

        return success("Deleted Successfully");
    }
}
