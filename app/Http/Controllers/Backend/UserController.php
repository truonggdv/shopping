<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(10);
        return view('admin.user.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.create_edit')->with('role',$role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|unique:users,email',
            'password_re'=>'same:password',
        ],[
            'email.unique'=>'Email đã được sử dụng',
            'password_re.same' => 'Mật khẩu nhập lại không đúng'

        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
//        dd($input);
        $userCreate = User::create($input);
        $roles = $request->roles;


        $userCreate->syncRoles($roles);
        return redirect()->back()->with('thongbao','Thêm mới thành công');
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
        $data = User::findOrFail($id);
        $role = Role::all();
        $id_roles = json_decode($data->roles);

        return view('admin.user.create_edit',['data'=>$data,'role'=>$role,'id_roles'=>$id_roles]);
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
        $data = User::FindOrFail($id);
        $role = Role::all();
//        $this->validate($request,[
//            'password_re'=>'same:password',
//        ],[
//            'password_re.same' => 'Mật khẩu nhập lại không đúng'
//
//        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $data->update($input);
        $roles = $request->roles;

        $data->syncRoles($roles);
        return redirect()->route('user.index')->with('thongbao','Chỉnh sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('thongbao','Xóa thành công');
    }
}
