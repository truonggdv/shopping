<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Banner;
use App\Models\Introduce;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        //its just a dummy data object.
        $banner = Banner::orderBy('id','desc')->get();
        $itroduce = Introduce::orderBy('id','desc')->first();
        view()->share(['banner'=>$banner,'itroduce'=>$itroduce]);
    }
}
