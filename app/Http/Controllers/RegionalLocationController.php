<?php

namespace App\Http\Controllers;

use App\Models\RegionalLocation;
use Illuminate\Http\Request;

class RegionalLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        RegionalLocation::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegionalLocation  $regionalLocation
     * @return \Illuminate\Http\Response
     */
    public function show(RegionalLocation $regionalLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegionalLocation  $regionalLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(RegionalLocation $regionalLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegionalLocation  $regionalLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        RegionalLocation::findorFail($id)->fill($request->all())->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegionalLocation  $regionalLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegionalLocation::findorFail($id)->delete();
        return back();
    }
}
