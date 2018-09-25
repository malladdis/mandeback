<?php

namespace App\Api\V1\Controllers;

use App\Models\IndicatorCalculationMethod;
use Illuminate\Http\Request;

class IndicatorCalculationMethodController extends Controller
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
        $calculationMethod=new IndicatorCalculationMethod();
        $calculationMethod->indicator_id=$request->indicator_id;
        $calculationMethod->calculation_method_id=$request->calculation_method_id;
        if($calculationMethod->save()){
            return response()->json(['status'=>true,'message'=>'data successfully saved','data'=>$calculationMethod]);
        }else{
            return response()->json(['status'=>false,'message'=>'data is not saved']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IndicatorCalculationMethod  $indicatorCalculationMethod
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calculationMethod=IndicatorCalculationMethod::where('indicator_id',$id)
                           ->join('calculation_methods','calculation_methods.id','=','indicator_calculation_methods.calculation_method_id')
                           ->get();
        if($calculationMethod){
            return response()->json(['status'=>true,'message'=>'data is retrieved successfully','data'=>$calculationMethod]);
        }else{
            return response()->json(['status'=>false,'message'=>'data is not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndicatorCalculationMethod  $indicatorCalculationMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(IndicatorCalculationMethod $indicatorCalculationMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IndicatorCalculationMethod  $indicatorCalculationMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $indicatorCalculationMethod=IndicatorCalculationMethod::where('indicator_id',$request->indicator_id)->get();
        if(count($indicatorCalculationMethod)>0){
            $indicalc=IndicatorCalculationMethod::find($indicatorCalculationMethod[0]['id']);
            $indicalc->indicator_id=$request->indicator_id;
            $indicalc->calculation_method_id=$request->calculation_method_id;
            if($indicalc->save()){
                return response()->json(['status'=>true,'message'=>'updated Succesffuly','data'=>$indicalc]);
            }

        }else{
            return response()->json(['status'=>false,'message'=>'data is not found','data'=>''],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndicatorCalculationMethod  $indicatorCalculationMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndicatorCalculationMethod $indicatorCalculationMethod)
    {
        //
    }
}
