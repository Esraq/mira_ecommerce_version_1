<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Category;

use App\Models\Information;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::orderBy('id', 'ASC')->get();
        view()->share('products',$products);
        return view('good_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::orderBy('id', 'ASC')->get();
        view()->share('categories',$categories);
        return view('create_good');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Product $product)
    {
        echo $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        /*$request->validate([
            'title' => 'required',
            'details'=>'required',
            
            
        ]);
  
        $input = $request->all();

        //echo $input->title;

        $info->update($input);
    
        return redirect('information')->with('success', true);

        */

        $info =Information::find($request->id);
        $info->update([
            'title' => $request->title,
            'details' => $request->details,
            
        ]);

        return redirect('information')->with('success', true);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
