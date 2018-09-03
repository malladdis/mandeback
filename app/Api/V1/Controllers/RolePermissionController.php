<?php

namespace App\Api\V1\Controllers;

use App\Models\RolePermission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission=RolePermission::where('role_id','1')->where('permission','role.store')
                   ->get();
        echo $permission[0]['is_allowed'];
        //return response()->json($permission);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $role_id
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {
        $permissions=RolePermission::join('permissions','permissions.id','=','role_permissions.permissions_id')
                    ->join('models','models.id','=','permissions.models_id')->where('role_id',$role_id)
                    ->select('role_permissions.id','name','route','display_name','role_permissions.is_allowed')->get();
        if($permissions){
            return response()->json($permissions);
        }else{
            return response()->json(['status'=>'fail','message'=>'permission for this role is not ound']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function edit(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolePermission $rolePermission)
    {
        //
    }
}
