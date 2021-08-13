<?php

namespace App\Http\Controllers;

use App\Models\Bloodline;
use App\Models\BloodlineImage;
use Illuminate\Http\Request;

class BloodlineController extends Controller
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
        $i = 0;
        $bloodline = Bloodline::create($request->except('file'));

        if($request->hasFile('file')){
            foreach($request->file('file') as $image)
            {
                $imageName = $bloodline->id.'_'.time().'_'.$i++.'.'.$image->extension();  
            
                $image->move(public_path('bloodline'), $imageName);

                $fileNames[] = $imageName;
            }

            foreach($fileNames as $image)
            {
                BloodlineImage::create([
                    'national_id' => $request->national_id,
                    'bloodline_id' => $bloodline->id,
                    'image' => $image,
                ]);
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function show(Bloodline $bloodline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloodline $bloodline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bloodline $bloodline)
    {
        $i = 0;
        $bloodline->fill($request->except('file'))->save();

        if($request->hasFile('file')){
            foreach($request->file('file') as $image)
            {
                $imageName = $bloodline->id.'_'.time().'_'.$i++.'.'.$image->extension();  
            
                $image->move(public_path('bloodline'), $imageName);

                $fileNames[] = $imageName;
            }

            foreach($fileNames as $image)
            {
                BloodlineImage::create([
                    'bloodline_id' => $bloodline->id,
                    'image' => $image,
                    'national_id', $request->national_id,
                ]);
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloodline $bloodline)
    {
        $bloodline->delete();
        return back();
    }
}
