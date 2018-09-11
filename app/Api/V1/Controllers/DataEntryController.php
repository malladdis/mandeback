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
        $previusdataEntry=DataEntry::where('indicator_id',$request->indicator_id)->where('frequency_symbol',$request->frequency_symbol)->get();
        if(count($previusdataEntry)<=0){
            $dataEntry=new DataEntry();
            $dataEntry->indicator_id=$request->indicator_id;
            $dataEntry->frequency_symbol=$request->frequency_symbol;
            $dataEntry->actual_value=$request->actual_value;
            $dataEntry->save();
            return response()->json(['status'=>true,'message'=>'data is saved successfully','data'=>$dataEntry]);
        }else{
         $updateData=DataEntry::find($previusdataEntry[0]['id']);
         $newActualValue=$updateData['actual_value']+$request->actual_value;
         $updateData->actual_value=$newActualValue;
         $updateData->save();
         return response()->json(['status'=>true,'message'=>'data is retrieved successfully','data'=>$updateData]);
        }
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
