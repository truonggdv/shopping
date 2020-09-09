<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Files;
use App\Models\Background;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Background::orderBy('id','desc')->paginate(5);
        return view('admin.background.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.background.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($request->file('image')){
            $input['image']=Files::upload_image($request->file('image'),'image',null,1500,1000);
        }
        Background::create($input);
        return redirect()->back()->with('thongbao','Thêm mới thành công !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Background::find($id);
        return view('admin.background.create_edit')->with('data',$data);
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
        $data = Background::find($id);
        $input = $request->all();
        if($request->file('image')){
            $input['image']=Files::upload_image($request->file('image'),'image',null,1500,1000);
        }
        $data->update($input);
        return redirect()->route('background.index')->with('thongbao','Chỉnh sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Background::destroy($id);
        return redirect()->route('background.index')->with('thongbao','Xóa ảnh thành công');
    }
}
