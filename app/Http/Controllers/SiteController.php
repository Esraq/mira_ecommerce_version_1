<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;

class SiteController extends Controller
{
    public function index(){
     
        $banner=Banner::where('slogan','N/A')->get();
        $banner_top=Banner::where('serial_no','4')->get();
        $banner_bottom=Banner::where('serial_no','5')->get();
        view()->share('banner',$banner);
        view()->share('banner_top',$banner_top);
        view()->share('banner_bottom',$banner_bottom);
        return view('site');
    }
}
