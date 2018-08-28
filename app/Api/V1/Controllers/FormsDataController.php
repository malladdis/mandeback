<?php

namespace App\Api\V1\Controllers;

use App\Models\FormsData;
use Dingo\Api\Http\Request;

class FormsDataController extends Controller
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
        $arrayData=FormsData::where('form_id',$request->form_id)->get();
        if(count($arrayData)>0){
            $previusData=$arrayData[0]['data'];
            $storedData= substr($previusData,0,strpos($previusData,']'));
            $sentedData=$request->data;
            $divededSentedData=substr($sentedData,strpos($sentedData,'[')+1,strpos($sentedData,']'));

            $totalData=$storedData.",".$divededSentedData;

            $updateTable=FormsData::find($arrayData[0]['id']);
            $updateTable->data=$totalData;
            if($updateTable->save()){
                return response()->json(['status'=>'ok','message'=>'data is saved successfully','data'=>$updateTable],200);
            }
        }else{
            $formData=new FormsData();
            $formData->form_id=$request->form_id;
            $formData->data=$request->data;
            if($formData->save()){
                return response()->json(['success'=>'ok','message'=>'data is save successfully','data'=>$formData],200);
            }else {
                return response()->json(['success' => 'ok', 'message' => 'data is not found ):'], 404);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormsData  $formsData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formData=FormsData::where('form_id',$id)->get();
        if($formData){
            return response()->json(['status'=>'fail','message'=>'data fetched successfully','data'=>$formData],200);
        }else{
            return response()->json(['status'=>'ok','message'=>'data is not found ):'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormsData  $formsData
     * @return \Illuminate\Http\Response
     */
    public function edit(FormsData $formsData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormsData  $formsData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormsData $formsData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormsData  $formsData
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormsData $formsData)
    {
        //
    }
}