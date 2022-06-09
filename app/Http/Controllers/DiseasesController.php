<?php

namespace App\Http\Controllers;

use App\Models\Diseases;
use App\Models\Crop;
use DB;
use Illuminate\Http\Request;

class DiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crops = DB::table('crops')->get();
        // $crops = Crop::all();
        return view('crops.diseases', compact('crops'));
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
     * @param  \App\Models\Diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function show(Diseases $diseases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function edit(Diseases $diseases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diseases $diseases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diseases $diseases)
    {
        //
    }
}
