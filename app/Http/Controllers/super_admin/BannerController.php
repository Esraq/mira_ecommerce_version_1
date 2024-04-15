<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       /// $banners=Banner::all();
        $banners =Banner::orderBy('serial_no', 'ASC')->get();
       view()->share('banners',$banners);
        return view('super_admin/banner_list',compact('banners'));

        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super_admin/create_banner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_no' => 'required',
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Banner::create($input);
        
    
        return redirect()->route('banner.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
     return view('super_admin/banner_edit',compact('banner'));

       //echo $banner;

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Banner $banner)
    {
        $request->validate([
            'serial_no' => 'required',
            'slogan' => 'required',
            
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $banner->update($input);
    
        return redirect()->route('banner.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
         
        return redirect()->route('banner.index')->with('success', true);
    }
}
