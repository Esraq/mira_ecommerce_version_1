<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =Category::orderBy('id', 'ASC')->get();
        view()->share('categories',$categories);
        return view('super_admin/category_list',compact('categories'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super_admin/create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'icon'=>'required',
            
            
        ]);

        
  
        $input = $request->all();

        Category::create($input);

       
        
    
        return redirect()->route('category.index')->with('success', true);
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
    public function edit(Category $category)
    {
        return view('super_admin/category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'category_name' => 'required',
            'icon'=>'required',
            
            
        ]);
  
        $input = $request->all();

        $category->update($input);
    
        return redirect()->route('category.index')->with('success', true);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
         
        return redirect()->route('category.index')->with('success', true);
    }
}
