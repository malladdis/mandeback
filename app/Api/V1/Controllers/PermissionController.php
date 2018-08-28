<?php

namespace App\Api\V1\Controllers;

use App\Models\Models;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions=Permission::join('models','permissions.models_id','=','models.id')
                    ->select('permissions.id','models.name','permissions.route','permissions.display_name')->get();
        return response()->json($permissions);
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
        $arrayList=Array();
        $models =Models::all();
        foreach ($models as $key=>$value){
            $modelRouteName= $this->replaceSpace($value['name']);
            if($modelRouteName!='modelss'&&$modelRouteName!='migration]s'){
                $model_id=$value['id'];
                $this->generateIndexRoute($model_id,$modelRouteName);
                $this->generatedShowRoute($model_id,$modelRouteName);
                $this->generateStoreRoute($model_id,$modelRouteName);
                $this->generateUpdateRoute($model_id,$modelRouteName);
                $this->generateDeleteRoute($model_id,$modelRouteName);
            }
            /*
            $this->generateStore($model_id,$modelRouteName);
            $this->generateShow($model_id,$modelRouteName);
            $this->generateEdit($model_id,$modelRouteName);
            $this->generateDelete($model_id,$modelRouteName);
            $this->generateIndexRoute($model_id,$modelRouteName);
            $this->generateStoreRoute($model_id,$modelRouteName);
            $this->generatedShowRoute($model_id,$modelRouteName);
            $this->generateUpdateRoute($model_id,$modelRouteName);
            $this->generateDeleteRoute($model_id,$modelRouteName);*/
        }
    }

    public function generateIndexRoute($model_id,$value){
           $index=$value."."."index";
           $per=new Permission();
           $per->models_id=$model_id;
           $per->route=$index;
           $per->display_name="Can see ".$value;
           $per->save();

    }
    public function generatedShowRoute($model_id,$value){
        $index=$value."."."show";
        $per=new Permission();
        $per->models_id=$model_id;
        $per->route=$index;
        $per->display_name="Can show ".$value;
        $per->save();

    }

    public function generateUpdateRoute($model_id,$value){
        $index=$value."."."update";
        $per=new Permission();
        $per->models_id=$model_id;
        $per->route=$index;
        $per->display_name="Can update ".$value;
        $per->save();
    }
    public function generateStoreRoute($model_id,$value){
        $index=$value."."."store";
        $per=new Permission();
        $per->models_id=$model_id;
        $per->route=$index;
        $per->display_name="Can Register new ".$value;
        $per->save();
    }

    public function generateDeleteRoute($model_id,$value){
        $index=$value."."."destroy";
        $per=new Permission();
        $per->models_id=$model_id;
        $per->route=$index;
        $per->display_name="Can Delete ".$value;
        $per->save();
    }
    public function replaceSpace($value){
        $routeName = preg_replace('/\s+/', '_', $value)."s";
        return strtolower($routeName);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}

class ModelPermission{
    private $modelId;
    private $route_index;
    private $route_store;
    private $route_show;
    private $route_edit;
    private $route_delete;
    private $display_name_index;
    private $display_name_store;
    private $display_name_show;
    private $display_name_edit;
    private $display_name_delete;

    function  __constrcut($id,$route_index,$route_store,$route_show,$route_edit,$route_delete,$display_index,$display_store,$display_show,$display_edit,$display_delete){
    $this->modelId=$id;
    $this->route_index=$route_index;
    $this->route_store=$route_store;
    $this->route_show=$route_show;
    $this->route_edit=$route_edit;
    $this->route_delete=$route_delete;
    $this->display_name_index=$display_index;
    $this->display_name_store=$display_store;
    $this->display_name_show=$display_show;
    $this->display_name_edit=$display_edit;
    $this->display_name_delete=$display_delete;
}

}
