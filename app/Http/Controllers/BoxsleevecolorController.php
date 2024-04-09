<?php

namespace App\Http\Controllers;

use App\Models\boxsleevecolor;
use Illuminate\Http\Request;

class BoxsleevecolorController extends Controller
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
                $boxslevecolor = new Boxsleevecolor();
                $boxslevecolor->boxsleeveupgrade_id = $color['optionid'];
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
     * @param  \App\Models\boxsleevecolor  $boxsleevecolor
     * @return \Illuminate\Http\Response
     */
    public function show(boxsleevecolor $boxsleevecolor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boxsleevecolor  $boxsleevecolor
     * @return \Illuminate\Http\Response
     */
    public function edit(boxsleevecolor $boxsleevecolor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boxsleevecolor  $boxsleevecolor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boxsleevecolor $boxsleevecolor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boxsleevecolor  $boxsleevecolor
     * @return \Illuminate\Http\Response
     */
    public function destroy(boxsleevecolor $boxsleevecolor, $id)
    {
        //
        $boxsleevecolor->find($id)->delete();

        return success("Box & Sleeve Color Deleted");
    }
}
