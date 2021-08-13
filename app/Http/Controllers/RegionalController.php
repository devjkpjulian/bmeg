<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use App\Models\RegionalLocation;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->admin == true ? view('endorsers.regionals.index') : view('endorsers.regionals.guest');
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
        $regional = Regional::create($request->except('image'));
        if($request->has('image')){
        
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('regional'), $imageName);

            $regional->image = $imageName;
            
            $regional->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function show(Regional $regional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function edit(Regional $regional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regional $regional)
    {
        $regional->fill($request->except('image'))->save();

        if($request->has('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('regional'), $imageName);

            $regional->image = $imageName;

            $regional->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regional $regional)
    {
        $regional->delete();
        return back();
    }
}
