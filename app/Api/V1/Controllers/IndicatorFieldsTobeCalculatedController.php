<?php

namespace App\Api\V1\Controllers;

use App\Models\IndicatorFieldsTobeCalculated;
use http\Env\Response;
use Illuminate\Http\Request;

class IndicatorFieldsTobeCalculatedController extends Controller
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
        $fields=new IndicatorFieldsTobeCalculated();
        $fields->indicator_form_id=$request->indicator_form_id;
        $fields->name=$request->name;
        if($fields->save()){
            return response()->json(['status'=>true,'message'=>'data is save successfully','data'=>$fields]);
        }else{
            return response()->json(['status'=>true,'message'=>'data is save successfully','data'=>$fields]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IndicatorFieldsTobeCalculated  $indicatorFieldsTobeCalculated
     * @return \Illuminate\Http\Response
     */
    public function show(IndicatorFieldsTobeCalculated $indicatorFieldsTobeCalculated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndicatorFieldsTobeCalculated  $indicatorFieldsTobeCalculated
     * @return \Illuminate\Http\Response
     */
    public function edit(IndicatorFieldsTobeCalculated $indicatorFieldsTobeCalculated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IndicatorFieldsTobeCalculated  $indicatorFieldsTobeCalculated
     * @return \Illuminate\Http\Response
     */
    public function update($id, \Dingo\Api\Http\Request $request)
    {
        $field=IndicatorFieldsTobeCalculated::where('indicator_form_id',$id)->get();

        $formField=IndicatorFieldsTobeCalculated::find($field[0]['id']);
        $formField->indicator_form_id=$id;
        $formField->name=$request->name;
        if($formField->save()){
            return response()->json(['status'=>true,'message'=>'updated Succesffuly','data'=>$formField]);
        }else{
            return response()->json(['status'=>false,'message'=>'Not updated','data'=>array()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndicatorFieldsTobeCalculated  $indicatorFieldsTobeCalculated
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndicatorFieldsTobeCalculated $indicatorFieldsTobeCalculated)
    {
        //
    }
}
