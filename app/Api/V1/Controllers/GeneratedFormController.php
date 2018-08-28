<?php

namespace App\Api\V1\Controllers;

use App\Models\GeneratedForm;
use Illuminate\Http\Request;

class GeneratedFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generated=GeneratedForm::all();
        return response()->json($generated);
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
        $generated=new GeneratedForm();
        $generated->form_id=$request->form_id;
        $generated->html_document=$request->html_document;
        if($generated->save()){
            return response()->json(['status'=>'ok','message'=>'data is save successfully','data'=>$generated],200);
        }else{
            return response()->json(['status'=>'false','message'=>'data is not save successfully'],209);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneratedForm  $generatedForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generatedForm=GeneratedForm::where('form_id',$id)->get();
        if($generatedForm){
            return response()->json(['success'=>'ok','message'=>'data is fetched successfully','data'=>$generatedForm],200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneratedForm  $generatedForm
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneratedForm $generatedForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneratedForm  $generatedForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneratedForm $generatedForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneratedForm  $generatedForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneratedForm $generatedForm)
    {
        //
    }
}
