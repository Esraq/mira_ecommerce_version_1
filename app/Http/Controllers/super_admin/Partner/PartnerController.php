<?php

namespace App\Http\Controllers\super_admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners =Partner::orderBy('serial_no', 'ASC')->get();
        view()->share('partners',$partners);
         return view('super_admin/partner/partner_list',compact('partners'));
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super_admin/partner/create_partner');
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
    
        Partner::create($input);
        
       
    
        return redirect()->route('partner.index')->with('success', true);
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
    public function edit(Partner $partner)
    {
       //// echo $partner;
        return view('super_admin/partner/edit_partner',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Partner $partner)
    {
        $request->validate([
            'serial_no' => 'required',
            
            
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
          
        $partner->update($input);
    
        return redirect()->route('partner.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
         
        return redirect()->route('partner.index')->with('success', true);
    }
}
