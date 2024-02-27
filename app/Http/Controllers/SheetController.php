<?php

namespace App\Http\Controllers;

use App\Models\sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
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
            'sheet' => sheet::all(),
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
        $sheet = new sheet();
        $sheet->name = $request->name;
        $sheet->img = storeFile($request, 'img', '/img/sheet/');
        $sheet->save();

        return response([
            'success' => true,
            'message' => 'Created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function show(sheet $sheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(sheet $sheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sheet $sheet, $id)
    {
        //
        $sheet->find($id)->update([
            'name' => $request->name,
            // 'img' => storeFile($request, 'img', '/img/sheet'),
        ]);

        if ($request->hasFile('img')) {
            $sheet->find($id)->update([
                'img' => storeFile($request, 'img', '/img/sheet/'),
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
     * @param  \App\Models\sheet  $sheet
     * @return \Illuminate\Http\Response
     */
public function destroy(sheet $sheets,$id)
    {
        //
        $sheet = sheet::find($id);
        $sheet->delete();

        return response([
            'success' => true,
            'message' => 'Deleted successfully'
        ], 200);

    }
}
