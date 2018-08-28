<?php

namespace App\Api\V1\Controllers;

use App\Models\Models;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models=Models::with('permission')->get();


        return response()->json($models);
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

        $out = [];
        $path=app_path("Models/");
        $namespace="";
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $path
            ), \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $item) {
            /**
             * @var \SplFileInfo $item
             */
            if($item->isReadable() && $item->isFile() && mb_strtolower($item->getExtension()) === 'php'){
                $out[] =  $namespace .
                    str_replace("/", "\\", mb_substr($item->getRealPath(), mb_strlen($path), -4));
            }
        }
        foreach ($out as $key=>$value){
            $modelName= $this->deliciousCamelcase($value);
            $models =new Models();
            $models->name=$modelName;
            $models->save();
        }

    }

    function deliciousCamelcase($str)
    {
        $formattedStr = '';
        $re = '/
          (?<=[a-z])
          (?=[A-Z])
        | (?<=[A-Z])
          (?=[A-Z][a-z])
        /x';
        $a = preg_split($re, $str);
        $formattedStr = implode(' ', $a);
        return $formattedStr;
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function show(Models $models)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function edit(Models $models)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Models $models)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function destroy(Models $models)
    {
        //
    }
}
