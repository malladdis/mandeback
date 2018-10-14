<?php

namespace App\Api\V1\Controllers;

use App\Models\SharedForm;
use Dingo\Api\Http\Request;

class SharedFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharedForms=SharedForm::all();
        if($sharedForms){
            return response()->json(['status'=>true,'message'=>'data is retrieved successfully','data'=>$sharedForms],200);
        }else{
            return response()->json(['status'=>false,'message'=>'data is not found'],404);
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
        $sharedForm=new SharedForm();
        $sharedForm->user_id=$request->user_id;
        $sharedForm->form_id=$request->form_id;
        if($sharedForm->save()){
            return response()->json(['status'=>true,'message'=>'data is save successfully','data'=>$sharedForm],200);
        }else{
            return response()->json(['status'=>false,'message'=>'data is not saved'],209);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SharedForm  $sharedForm
     * @return \Illuminate\Http\Response
     */
    public function show($formId)
    {
        $sharedForm=SharedForm::join('users','users.id','=','shared_forms.user_id')
            ->where('form_id',$formId)
            ->select('name','email','users.id as user_id')
            ->get();
        return response()->json(['status'=>true,'message'=>'data is retrieved successfully','data'=>$sharedForm],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SharedForm  $sharedForm
     * @return \Illuminate\Http\Response
     */
    public function edit(SharedForm $sharedForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SharedForm  $sharedForm
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $sharedForm=SharedForm::where('user_id',$id)->get();
        if(count($sharedForm)>0){
            $sharedForms=SharedForm::find($sharedForm[0]['id']);
            $sharedForms->user_id=$request->user_id;
            $sharedForms->form_id=$request->form_id;
            $sharedForms->save();
            if($sharedForms->save()){
                return response()->json(['status'=>true,'message'=>'Data is updated successfully'],200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SharedForm  $sharedForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sharedForm=SharedForm::where('user_id',$id)->get();
        if(count($sharedForm)>0){
            $form=SharedForm::find($sharedForm[0]['id']);
            $form->delete();
            return response()->json(['status'=>0,'message'=>'data is deleted successfully'],200);
        }
    }
}
