<?php

namespace App\Http\Controllers;

use App\Models\BloodlineImage;
use Illuminate\Http\Request;

class BloodlineImageController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodlineImage  $bloodlineImage
     * @return \Illuminate\Http\Response
     */
    public function show(BloodlineImage $bloodlineImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodlineImage  $bloodlineImage
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodlineImage $bloodlineImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodlineImage  $bloodlineImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodlineImage $bloodlineImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodlineImage  $bloodlineImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BloodlineImage::findOrFail($id)->destroy($id);
        return back();
    }
}
