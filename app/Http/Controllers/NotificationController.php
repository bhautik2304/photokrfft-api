<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return success("retrived Successfully", notification::all());
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notification $notification)
    {
        //
        $notification->query()->update([
            "status"=>true
        ]);

        return success("All Read");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(notification $notification)
    {
        //

        $notification->query()->delete();

        return success("All Deleted");
    }
}
