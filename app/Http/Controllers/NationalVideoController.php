<?php

namespace App\Http\Controllers;

use App\Models\NationalVideo;
use Illuminate\Http\Request;

class NationalVideoController extends Controller
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
        $nationalVideo = NationalVideo::create($request->except('video'));
        if($request->hasFile('video'))
        {
            $videoName = $request->national_id.'_'.time().'.'.$request->video->extension();
            $request->video->move(public_path('video'), $videoName);
            $nationalVideo->video = $videoName;
            $nationalVideo->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function show(NationalVideo $nationalVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalVideo $nationalVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $nationalVideo = NationalVideo::findOrFail($id);
        $nationalVideo->fill($request->except('video'))->save();;
        if($request->hasFile('video'))
        {
            $videoName = $request->national_id.'_'.time().'.'.$request->video->extension();
            $request->video->move(public_path('video'), $videoName);
            $nationalVideo->video = $videoName;
            $nationalVideo->save();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationalVideo = NationalVideo::findOrFail($id);
        $nationalVideo->delete();
        return back();
    }
}
