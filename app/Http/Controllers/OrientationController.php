<?php

namespace App\Http\Controllers;

use App\Models\orientation;
use Illuminate\Http\Request;

class OrientationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(['success' => true, 'message' => 'Orientation list', 'data' => orientation::all()], 200);
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
    public function store(Request $req)
    {
        //

        // create file store in public folder

        // dd($req->toArray());

        $orientation = new orientation;
        $orientation->name = $req->input('name');
        $orientation->img = storeFile($req, 'img', '/img/orientation/');
        $orientation->save();

        return response(['success' => true, 'message' => 'Orientation created', 'data' => $orientation], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orientation  $orientation
     * @return \Illuminate\Http\Response
     */
    public function show(orientation $orientation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orientation  $orientation
     * @return \Illuminate\Http\Response
     */
    public function edit(orientation $orientation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orientation  $orientation
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, orientation $orientations, $id)
    {
        //
        // dd($requests->all());
        $orientations->find($id)->update([
            'name' => $request->input('name')
        ]);

        if ($request->hasFile('img')) {
            $orientations->find($id)->update([
                'img' => storeFile($request, 'img', '/img/orientation/')
            ]);
        }

        return response(['success' => true, 'message' => 'Orientation updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orientation  $orientation
     * @return \Illuminate\Http\Response
     */
    public function destroy(orientation $orientations, $id)
    {
        //
        $orientations->find($id)->delete();
        return response(['success' => true, 'message' => 'Orientation deleted'], 200);
    }
}
