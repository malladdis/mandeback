<?php

namespace App\Api\V1\Controllers;

use App\FormDataFile;
use App\Models\FormsData;
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
        $destinationPath = 'uploads';
        $file_name = time().'.'.$request->file->getClientOriginalExtension();
        $filePath=$file_name;
        $request->file->move($destinationPath,$file_name);

        $arrayData = FormsData::where('form_id', $request->form_id)->get();
        if (count($arrayData) > 0) {
            $previusData = $arrayData[0]['data'];
            $storedData = substr($previusData, 0, strpos($previusData, ']'));
            $jsonData= json_decode($request->data,true);
            foreach ($jsonData as $key=>$value){
                $jsonData[$key]['files']=$filePath;
            }
            $sentedData=json_encode($jsonData);
            $divededSentedData = substr($sentedData, strpos($sentedData, '[') + 1, strpos($sentedData, ']'));

            $totalData = $storedData . "," . $divededSentedData;

            $updateTable = FormsData::find($arrayData[0]['id']);
            $updateTable->data = $totalData;
            if ($updateTable->save()) {
                return response()->json(['status' => 'ok', 'message' => 'data is saved successfully', 'data' => $updateTable], 200);
            }
        } else {
            $formData = new FormsData();
            $formData->form_id = $request->form_id;

            $jsonData= json_decode($request->data,true);
            foreach ($jsonData as $key=>$value){
               $jsonData[$key]['files']=$filePath;
            }
            $formData->data =json_encode($jsonData);
            $formData->save();
            return response()->json(['success' => 'ok', 'message' => 'data is save successfully', 'data' => $jsonData], 200);

        }


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
