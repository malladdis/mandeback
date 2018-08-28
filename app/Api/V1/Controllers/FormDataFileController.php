<?php

namespace App\Api\V1\Controllers;

use App\FormDataFile;
use Illuminate\Http\Request;
use JWTAuth;

class FormDataFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "hello world";
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
        $file=$request->file;
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        return response()->json(['status'=>'ok','message'=>'file uploaded successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormDataFile  $formDataFile
     * @return \Illuminate\Http\Response
     */
    public function show(FormDataFile $formDataFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormDataFile  $formDataFile
     * @return \Illuminate\Http\Response
     */
    public function edit(FormDataFile $formDataFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormDataFile  $formDataFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormDataFile $formDataFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormDataFile  $formDataFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormDataFile $formDataFile)
    {
        //
    }
}
