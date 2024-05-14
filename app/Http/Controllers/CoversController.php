<?php

namespace App\Http\Controllers;

use App\Models\covers;
use App\Models\coversupgrades;
use App\Models\productcovers;
use Illuminate\Http\Request;

class CoversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return success('Retrieved successfully', covers::all());
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
        $covers = new covers();
        $covers->name = $request->name;
        $covers->type = $request->type;
        $covers->img = storeFile($request, 'img', '/img/covers/');
        $covers->save();

        return created('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function show(covers $covers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function edit(covers $covers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, covers $covers, $id)
    {
        //
        $covers->find($id)->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        if ($request->hasFile('img'))
            $covers->find($id)->update([
                'img' => storeFile($request, 'img', '/img/covers/'),
            ]);

        return success('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function destroy(covers $covers, $id)
    {
        //
        $covers->find($id)->delete();
        try {
            //code...
            coversupgrades::where('cover_id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            //code...
            productcovers::where('cover_id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return success('Deleted successfully');
    }

    public function statusChange(Request $request, $id)
    {
        covers::find($id)->update([
            "status" => $request->status
        ]);

        return success('Status Change Successfully');
    }
}
