<?php

namespace App\Api\V1\Controllers;

use App\Models\DataEntry;
use App\Models\Indicator;
use App\Models\Project;
use Illuminate\Http\Request;

class DataEntryController extends Controller
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
     * @param  \App\DataEntry  $dataEntry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $dateEntry= DataEntry::where('indicator_id',$id)->get();
        if($dateEntry){
            return response()->json(['status'=>true,'message'=>'data retrieved successfully','data'=>$dateEntry]);

        }else{
            return response()->json(['status'=>false,'message'=>'data is not found','data'=>array()]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataEntry  $dataEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(DataEntry $dataEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataEntry  $dataEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataEntry $dataEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataEntry  $dataEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataEntry $dataEntry)
    {
        //
    }
}
