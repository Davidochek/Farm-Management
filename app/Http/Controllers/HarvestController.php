<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use Illuminate\Http\Request;
use Validator;
class HarvestController extends Controller
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
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
        ]);
          if ($validator->passes()) {
            $harvest =  Harvest::create($request->all());
         return response()->json(['success'=>'Harvest is successfully added']);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function show(Harvest $harvest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function edit(Harvest $harvest)
    {
        //
    }

     public function updateharvest(Request $request, $id)
    {
        $id = $request['id'];
        $harvest = Harvest::findOrFail($id);
         $harvest->update($request->all());
         return response()->json(['success'=>'Harvest is successfully updated']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Harvest $harvest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $harvest = Harvest::find($id);
        $harvest->delete();
        return response()->json(['success'=>'Harvest is successfully deleted']);
    }

     public function deleteharvest($id)
    {
        $harvest = Harvest::find($id);
        $harvest->delete();
        return response()->json(['success'=>'Harvest is successfully deleted']);
    }
}
