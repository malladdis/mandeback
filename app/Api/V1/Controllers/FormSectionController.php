<?php

namespace App\Api\V1\Controllers;

use App\Models\FormSection;
use Illuminate\Http\Request;

class FormSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formSections=FormSection::all();
        if($formSections){
            return response()->json(['success'=>'ok','message'=>'Data is fetched successfully','data'=>$formSections],200);
        }else{
            return response()->json(['success'=>'false','message'=>'data is not created yet ):'],404);
        }
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
        $sections=new FormSection();
        $sections->name=$request->name;
        $sections->icon=$request->icon;
        $sections->material_html=$request->material_html;
        if($sections->save()){
            return response()->json(['success'=>'ok','message'=>'form save successfully ):','data'=>$sections],201);
        }else{
            return response()->json(['success'=>'false','message'=>'data is not save successfully'],209);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormSection  $formSection
     * @return \Illuminate\Http\Response
     */
    public function show(FormSection $formSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormSection  $formSection
     * @return \Illuminate\Http\Response
     */
    public function edit(FormSection $formSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormSection  $formSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormSection $formSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormSection  $formSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormSection $formSection)
    {
        //
    }
}
