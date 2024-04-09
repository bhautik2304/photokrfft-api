<?php

namespace App\Http\Controllers;

use App\Models\boxsleevecolor;
use App\Models\boxsleeveupgrade;
use Illuminate\Http\Request;

class BoxsleeveupgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return success("Retrived All", boxsleeveupgrade::all());
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
        $boxsleeveupgrade = new boxsleeveupgrade();
        $boxsleeveupgrade->boxsleeve_id = $request->boxsleeve_id;
        $boxsleeveupgrade->name = $request->name;
        $boxsleeveupgrade->img = storeFile($request, 'img', '/img/boxsleeveupgrades/');
        $boxsleeveupgrade->save();

        if ($request->has('colors')) {
            foreach ($request->colors as $colorData) {
                $color = new boxsleevecolor();
                $color->boxsleeveupgrade_id = $boxsleeveupgrade->id;
                $color->color_id = $colorData;
                $color->save();
                // if()
                // return $color;
            }
        }

        return created("$boxsleeveupgrade->name save successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boxsleeveupgrade  $boxsleeveupgrade
     * @return \Illuminate\Http\Response
     */
    public function show(boxsleeveupgrade $boxsleeveupgrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boxsleeveupgrade  $boxsleeveupgrade
     * @return \Illuminate\Http\Response
     */
    public function edit(boxsleeveupgrade $boxsleeveupgrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boxsleeveupgrade  $boxsleeveupgrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        boxsleeveupgrade::find($id)->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('img')) {
            boxsleeveupgrade::find($id)->update([
                'img' => storeFile($request, 'img', '/img/boxsleeveupgrades/')
            ]);
        }

        // $coversupgrades->save();
        return success('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boxsleeveupgrade  $boxsleeveupgrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        boxsleeveupgrade::destroy($id);

        return success('Deleted successfully');
    }
}
