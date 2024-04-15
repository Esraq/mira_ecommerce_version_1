<?php

namespace App\Http\Controllers\super_admin\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Stock; 

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks =Stock::orderBy('id', 'ASC')->get();
        view()->share('stocks',$stocks);
        return view('super_admin/stock/stock_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::orderBy('id', 'ASC')->get();
        view()->share('categories',$categories);
        return view('super_admin/stock/create_stock');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'name' => 'required',
           'category_name' => 'required',
           'price' => 'required',
           'size' => 'required',
        ]);

        
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Stock::create($input);
        
        
        return redirect()->route('stock.index')->with('success', true);
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
    public function edit(Stock $stock)
    {
        $categories =Category::orderBy('id', 'ASC')->get();
        view()->share('categories',$categories);
        return view('super_admin/stock/stock_edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Stock $stock)
    {
        $request->validate([
            
            'name' => 'required',
            'category_name' => 'required',
            'price' => 'required',
            'size' => 'required',
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
          
        $stock->update($input);
    
        return redirect()->route('stock.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
         
        return redirect()->route('stock.index')->with('success', true);
    }
}
