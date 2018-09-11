<?php

namespace App\Api\V1\Controllers;

use App\Models\CalculationMethod;
use Illuminate\Http\Request;

class CalculationMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods=CalculationMethod::all();
        if($methods){
            return response()->json(['status'=>true,'data'=>$methods]);
        }else{
            return response()->json(['status'=>false,'message'=>'Calculation methods are not created yet );']);
        }
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
     * @param  \App\CalculationMethod  $calculationMethod
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calculationtion=CalculationMethod::find($id);
        if($calculationtion){
            return response()->json(['status'=>true,'message'=>'data is retrieved successfully','data'=>$calculationtion]);
        }else{
            return response()->json(['status'=>false,'message'=>'data is not found','data'=>array()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CalculationMethod  $calculationMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(CalculationMethod $calculationMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalculationMethod  $calculationMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalculationMethod $calculationMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CalculationMethod  $calculationMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalculationMethod $calculationMethod)
    {
        //
    }
}
