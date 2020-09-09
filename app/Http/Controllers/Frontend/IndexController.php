<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduce;
use App\Models\Background;
use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $background = Background::orderBy('id','desc')->first();
        $product_new = Product::orderBy('id','desc')->paginate(8);
        $product_nb = Product::orderBy('id','desc')->where('featured', 1)->paginate(8);
        return view('frontend.pages.index',['background'=>$background,'product_new'=>$product_new,'product_nb'=>$product_nb]);
    }
    public function getProduct($slug){
        $product = Product::inRandomOrder('id', 'DESC')->limit(8)->get();
        $data=Product::where('slug',$slug)->first();
        return view('frontend.pages.detail',['data'=>$data,'product'=>$product]);
    }
    public function getlichsu(){
            $data = Introduce::orderBy('id','desc')->select('history')->first();
            return view('frontend.pages.thong-tin.lich-su')->with('data',$data);
    }
    public function getthanhtuu(){
        $data = Introduce::orderBy('id','desc')->first();
        return view('frontend.pages.thong-tin.thanh-tuu')->with('data',$data);
    }
    public function gettamnhin(){
        $data = Introduce::orderBy('id','desc')->first();
        return view('frontend.pages.thong-tin.tam-nhin')->with('data',$data);
    }
    public function getsumenh(){
        $data = Introduce::orderBy('id','desc')->first();
        return view('frontend.pages.thong-tin.su-menh')->with('data',$data);
    }
    public function getlienhe(){
        $data = Introduce::orderBy('id','desc')->first();
//        dd($data);
        return view('frontend.pages.contact')->with('data',$data);
    }
    public function sendMail(Request $request){
            $dataMail = [
                'hoten'=>$request->name,
                'subject'=>$request->subject,
                'message'=>$request->message,
            ];
            $email = $request->email;
            Mail::send('frontend.pages.blank',$dataMail,function($meg) use ($email){
                $meg->from('truongdv.hqgroup@gmail.com','Leoo Shop');
//                $meg->cc('truongdv.hqgroup@gmail.com')->subject('Thông báo đặt hàng');
                $meg->to($email)->subject('Leoo Shop');
            });
            $input = $request->except('sbm');
            Feedback::create($input);
            return redirect('/lien-he');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $data = Product::find($slug);
//        return value('frontend.pages.detail',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
