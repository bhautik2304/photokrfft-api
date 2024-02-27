<?php

namespace App\Http\Controllers;

use App\Models\boxsleeve;
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
        return response([
            'boxsleeve' => boxsleeve::all(),
            'message' => 'Retrieved successfully'
        ], 200);
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

        return response([
            'success' => true,
            'message' => 'Created successfully'
        ], 200);
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
        ]);

        if ($request->hasFile('img')) {
            boxsleeve::find($id)->update([
                'img' => storeFile($request, 'img', '/img/boxsleeve/')
            ]);
        }

        return response([
            'success' => true,
            'message' => 'Updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boxsleeve  $boxsleeve
     * @return \Illuminate\Http\Response
     */
    public function destroy(boxsleeve $boxsleeve, $id)
    {
        //
        boxsleeve::find($id)->delete();

        return response([
            'success' => true,
            'message' => 'Deleted successfully'
        ], 200);
    }
}
