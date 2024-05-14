<?php

namespace App\Http\Controllers;

use App\Models\productSize;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return success("Retrived Succefully", Size::all());
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
        // Validate the request...
        $size = new Size();
        $size->name = $request->name;
        $size->img = storeFile($request, 'img', '/img/size/');
        $size->save();

        return created("Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size, $id)
    {
        //
        $size = Size::find($id)->update([
            'name' => $request->name,
            // 'img' => storeFile($request, 'img', '/img/size/'),
        ]);

        if ($request->hasFile('img')) {
            Size::find($id)->update([
                'img' => storeFile($request, 'img', '/img/size/'),
            ]);
        }

        return success('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size, $id)
    {
        //
        Size::find($id)->delete();
        productSize::where('size_id', $id)->delete();
        return success('Deleted successfully');
    }

    public function statusChange(Request $request, $id)
    {
        Size::find($id)->update([
            "status" => $request->status
        ]);

        return success('Status Change Successfully');
    }
}
