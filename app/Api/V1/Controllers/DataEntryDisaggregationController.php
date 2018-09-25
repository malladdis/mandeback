<?php

namespace App\Api\V1\Controllers;

use App\Models\DataEntryDisaggregation;
use Dingo\Api\Http\Request;


class DataEntryDisaggregationController extends Controller
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
        $data= $request->data;
        $id=$request->data_entry_id;
        $jsonData=json_decode($data,true);
        $size=DataEntryDisaggregation::where('data_entry_id',$id)->get();
        if(count($size)<=0){

            foreach ($jsonData as $key=>$value){
                foreach ($value as $keys=>$values){
                    $dataEntry=new DataEntryDisaggregation();
                    $dataEntry->data_entry_id=$id;
                    $dataEntry->disaggregation_attribute=$keys;
                    $dataEntry->value=$values;
                    $dataEntry->save();
                }
                $size=DataEntryDisaggregation::where('data_entry_id',$id)->get();
            }
        }else{
            foreach ($jsonData as $key=>$value){
                foreach ($value as $keys=>$values){
                    $prevData=DataEntryDisaggregation::where(['data_entry_id'=>$id,'disaggregation_attribute'=>$keys])->get();
                    $dataEntry=DataEntryDisaggregation::find($prevData[0]['id']);
                    $dataEntry->data_entry_id=$id;
                    $dataEntry->disaggregation_attribute=$keys;
                    $dataEntry->value=$prevData[0]['value']+$values;
                    $dataEntry->save();
                }
            }
            $size=DataEntryDisaggregation::where('data_entry_id',$id)->get();
        }

            return response(['status'=>true,'message'=>'data is ','data'=>$size]);

        //return response()->json($jsonData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataEntryDisaggregation  $dataEntryDisaggregation
     * @return \Illuminate\Http\Response
     */
    public function show(DataEntryDisaggregation $dataEntryDisaggregation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataEntryDisaggregation  $dataEntryDisaggregation
     * @return \Illuminate\Http\Response
     */
    public function edit(DataEntryDisaggregation $dataEntryDisaggregation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataEntryDisaggregation  $dataEntryDisaggregation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataEntryDisaggregation $dataEntryDisaggregation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataEntryDisaggregation  $dataEntryDisaggregation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataEntryDisaggregation $dataEntryDisaggregation)
    {
        //
    }
}
