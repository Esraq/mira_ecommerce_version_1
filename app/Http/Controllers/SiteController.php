<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;

use App\Models\Category;

use App\Models\Stock;

class SiteController extends Controller
{
    public function index(){
     
        $banner=Banner::where('slogan','N/A')->get();
        $banner_top=Banner::where('serial_no','4')->get();
        $banner_bottom=Banner::where('serial_no','5')->get();
        $categories =Category::orderBy('id', 'ASC')->get();
        $stocks =Stock::orderBy('id', 'ASC')->get();
        view()->share('stocks',$stocks);
        view()->share('categories',$categories);
        view()->share('banner',$banner);
        view()->share('banner_top',$banner_top);
        view()->share('banner_bottom',$banner_bottom);
        return view('site');
    }
}
