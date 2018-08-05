<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs= Program::with(['project'=>function($query){
            $query->with('outcome');
        }])->with('programDetail')->get();
        if($programs){
            return response()->json($programs,200);
        }else{
            return response()->json(['status'=>false,'message'=>'Program is not created yet ):'],404);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules=[
            'program_category_id'=>['required'],
            'name'=>['required']
        ];
        $payload= app('request')->only(['program_category_id','name']);
        $validator=app('validator')->make($payload,$rules);
        if($validator->fails()){
            return response()->json(['status'=>false,'message'=>$validator->errors()->first()]);
        }
        $programs=new Program();
        $programs->program_category_id=$request->program_category_id;
        $programs->name=$request->name;
        if($programs->save()){
            return response()->json(['status'=>true,'message'=>'Program created Successfully'],201);
        }else{
            return response()->json(['status'=>false,'message'=>"Program is not created"],209);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $programs=Program::where('id',$id)->with('project')->get();
        if(count($programs)>=1) {
            return response()->json($programs, 200);
        }else{
            return response()->json(['status'=>false,'message'=>'the data is not found in this id'],404);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $programs= Program::find($id);
        if($programs){
            $programs->program_category_id=$request->program_category_id;
            $programs->name=$request->name;
            if($programs->save()){
                return response()->json($programs,201);
            }
        }else{
            return response()->json(['status'=>false,'message'=>'The data is not find in this id'],404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program=Program::find($id);
        if($program){
            Program::destroy($id);
            return response()->json(['status'=>false,'message'=>'Deleted Successfully'],200);
        }else{
            return response()->json(['status'=>false,'message'=>'data is not find in this id'],404);
        }
    }
}
