<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{coversupgrades, coversupgradecolor};

class CoversupgradesController extends Controller
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
            'coversupgrades' => coversupgrades::all(),
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
        $coversupgrades = new coversupgrades();
        $coversupgrades->name = $request->name;
        $coversupgrades->cover_id = $request->cover_id;
        $coversupgrades->img = storeFile($request, 'img', '/img/coversupgrades/');
        $coversupgrades->save();

        if ($request->has('colors')) {
            foreach ($request->colors as $colorData) {
                $color = new coversupgradecolor();
                $color->coversupgrade_id = $coversupgrades->id;
                $color->color_id = $colorData;
                $color->save();
                // if()
                // return $color;
            }
        }
        // foreach ($request->colors as $colorData) {
        //     $color = new CoversUpgradeColor();
        //     $color->coversupgrade_id = $coversupgrades->id;
        //     $color->name = $colorData['name'];
        //     $color->colorcode = $colorData['code'];
        //     if (isset($colorData['img'])) {
        //         $file = $colorData['img'];
        //         $filepath = $file->move(public_path() . '/img/coversupgradescolors/', $file->getClientOriginalName());
        //         $color->img = url('/img/coversupgradescolors/' . $filepath->getFilename());
        //     }

        //     $color->save();
        //     // if()
        //     // return $color;
        // }

        return response([
            'success' => true,
            'message' => 'Created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coversupgrades  $coversupgrades
     * @return \Illuminate\Http\Response
     */
    public function show(coversupgrades $coversupgrades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coversupgrades  $coversupgrades
     * @return \Illuminate\Http\Response
     */
    public function edit(coversupgrades $coversupgrades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coversupgrades  $coversupgrades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coversupgrades $coversupgrades, $id)
    {
        //
        coversupgrades::find($id)->update([
            'name' => $request->name,
            'cover_id' => $request->cover_id,
        ]);

        if ($request->has('img')) {
            coversupgrades::find($id)->update([
                'img' => storeFile($request, 'img', '/img/coversupgrades/'),
            ]);
        }

        $coversupgrades->save();
        return response([
            'success' => true,
            'message' => 'Updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coversupgrades  $coversupgrades
     * @return \Illuminate\Http\Response
     */
    public function destroy(coversupgrades $coversupgrades, $id)
    {
        //
        // Find the coversupgrades record
        $coversupgrade = $coversupgrades->find($id);

        // Check if the coversupgrade record exists
        if (!$coversupgrade) {
            return response([
                'success' => false,
                'message' => 'Record not found'
            ], 404);
        }

        // Delete related coversupgradecolors records
        $coversupgrade->coversupgradecolors()->delete();

        // Delete the coversupgrades record
        $coversupgrade->delete();

        return response([
            'success' => true,
            'message' => 'Deleted successfully'
        ], 200);
    }
}
