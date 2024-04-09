<?php

namespace App\Http\Controllers;

use App\Models\boxsleeve;
use App\Models\boxsleeveupgrade;
use App\Models\productboxsleeve;
use Illuminate\Http\Request;

class BoxsleeveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return success("Retrived Successfully", boxsleeve::all());
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
        $boxsleeve = new boxsleeve();
        $boxsleeve->name = $request->name;
        $boxsleeve->img = storeFile($request, 'img', '/img/boxsleeve/');
        $boxsleeve->type = $request->type;
        $boxsleeve->save();

        return created('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boxsleeve  $boxsleeve
     * @return \Illuminate\Http\Response
     */
    public function show(boxsleeve $boxsleeve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boxsleeve  $boxsleeve
     * @return \Illuminate\Http\Response
     */
    public function edit(boxsleeve $boxsleeve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boxsleeve  $boxsleeve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boxsleeve $boxsleeve, $id)
    {
        //
        boxsleeve::find($id)->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        if ($request->hasFile('img')) {
            boxsleeve::find($id)->update([
                'img' => storeFile($request, 'img', '/img/boxsleeve/')
            ]);
        }

        return success('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boxsleeve  $boxsleeve
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        boxsleeve::find($id)->delete();
        try {
            //code...
            boxsleeveupgrade::where('boxsleeve_id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            //code...
            productboxsleeve::where('boxsleeve_id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return success('Deleted successfully');
    }
}
