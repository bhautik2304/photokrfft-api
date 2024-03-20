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
         return success('Retrived successfully',sheet::all());
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

         return created('Created successfully');
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

         return success('Updated successfully');
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

         return success('Deleted successfully');

    }
}
