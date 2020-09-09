<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Files;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::join('category','product.cat_id','=','category.cat_id')->orderBy('id','desc')->paginate(15);
        return view('admin.product.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create_edit')->with('category',$category);
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
            $input['image']=Files::upload_image($request->file('image'),'image',null,250,350);
        }
        $input['slug'] = Str::slug($request->name);
        Product::create($input);
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
        $category = Category::all();
        $data = Product::find($id);
        return view('admin.product.create_edit',['data'=>$data,'category'=>$category]);
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
        $data = Product::find($id);
        $input = $request->all();
        if($request->file('image')){
            $input['image']=Files::upload_image($request->file('image'),'image',null,250,350);
        }
        $input['slug'] = Str::slug($request->name);
        $data->update($input);
        return redirect()->route('product.index')->with('thongbao','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('thongbao','Xóa thành công');
    }
}
