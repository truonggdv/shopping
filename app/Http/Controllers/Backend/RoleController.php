<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::orderBy('id', 'DESC')->paginate(10);
        return view('admin.role.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();
        //return response()->json($permission);
        return view('admin.role.create_edit')->with('permission',$permission);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('permission_id');
        $data = Role::create($input);

        $data->syncPermissions($request->permission_id);

//        return response()->json([
//            'success'=>true,
//            'data'=>$data
//        ]);
        return redirect()->route('role.create')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::all();
        $data = Role::findOrFail($id);
        $id_permisson = json_decode($data->permissions);

//        return response()->json([
//            'data'=>$data,
//            'id_permisson'=>$id_permisson,
//        ]);
        return view('admin.role.create_edit',['data'=>$data, 'permission'=>$permission,'id_permisson'=>$id_permisson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Role::findOrFail($id);
        $input = $request->except('permission_id');
        $data->update($input);
        $data->syncPermissions($request->permission_id);

//        return response()->json([
//            'success'=>true,
//            'data'=>$data
//        ]);
        return redirect()->route('role.index')->with('thongbao','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
//        ->revokePermissionTo(permission_id)

//        return response()->json([
//            'success' => true,
//
//        ]);
        return redirect()->route('role.index')->with('thongbao','Xóa thành công');
    }
}
