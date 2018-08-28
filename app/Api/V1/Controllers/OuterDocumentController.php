<?php

namespace App\Api\V1\Controllers;

use App\Models\OuterDocument;
use Illuminate\Http\Request;

class OuterDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outer=OuterDocument::all();
        return response()->json($outer);
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
        $outer=new OuterDocument();
        $outer->html=$request->html;
        $outer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OuterDocument  $outerDocument
     * @return \Illuminate\Http\Response
     */
    public function show(OuterDocument $outerDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OuterDocument  $outerDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(OuterDocument $outerDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OuterDocument  $outerDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OuterDocument $outerDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OuterDocument  $outerDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(OuterDocument $outerDocument)
    {
        //
    }
}
