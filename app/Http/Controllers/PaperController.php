<?php

namespace App\Http\Controllers;

use App\Models\paper;
use Illuminate\Http\Request;

class PaperController extends Controller
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
            'paper' => paper::all(),
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
        $paper = new paper();
        $paper->name = $request->name;
        $paper->value = $request->value;
        $paper->img = storeFile($request, 'img', '/img/paper/');
        $paper->save();

        return response([
            'success' => true,
            'message' => 'Created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(paper $paper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paper $paper, $id)
    {
        //
        $paper = paper::find($id)->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);


        if ($request->hasFile('img')) {
            paper::find($id)->update([
                'img' => storeFile($request, 'img', '/img/paper/')
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
     * @param  \App\Models\paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(paper $papers, $id)
    {
        //
        $papers->find($id)->delete();

        return response([
            'success' => true,
            'message' => 'Deleted successfully'
        ], 200);
    }
}
