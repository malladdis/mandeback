<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\FormsColumn;
use Illuminate\Http\Request;

class FormsColumnController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $columsn =FormsColumn::all();
     return response()->json(['status'=>'ok','message'=>'data is fetched successfully','data'=>$columsn],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formColumn=new FormsColumn();
        $formColumn->form_id=$request->form_id;
        $formColumn->columns=$request->columns;
        if($formColumn->save()){
            return response()->json(['success'=>'ok','message'=>'successfully save ):','data'=>$formColumn],200);
        }else{
            return response()->json(['success'=>'fail','message'=>'data is not saved'],209);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormsColumn  $formsColumn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $columns=FormsColumn::where('form_id',$id)->get();
        return response()->json(['status'=>'ok','data'=>$columns]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormsColumn  $formsColumn
     * @return \Illuminate\Http\Response
     */
    public function edit(FormsColumn $formsColumn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormsColumn  $formsColumn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormsColumn $formsColumn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormsColumn  $formsColumn
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormsColumn $formsColumn)
    {
        //
    }
}
