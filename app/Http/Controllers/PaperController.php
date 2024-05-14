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
        return success('Retrieved successfully', paper::all());
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

        return created('Created successfully');
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

        return success('Updated successfully');
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

        return success('Deleted successfully');
    }

    public function statusChange(Request $request, $id)
    {
        paper::find($id)->update([
            "status" => $request->status
        ]);

        return success('Status Change Successfully');
    }
}
