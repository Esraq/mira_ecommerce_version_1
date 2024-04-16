<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Information;

class InformationController extends Controller
{
    public function edit_info($id){

        $info =Information::find($id);

        ///echo $info;
        return view('edit_info')->with("info",$info);

    }
    public function info(){
    
        $informations =Information::orderBy('id', 'ASC')->get();
        view()->share('informations',$informations);
         return view('info',compact('informations'));


    }

    public function update(Request $req){
        $info = Information::find($req->id);
        $info->update([
            'title' => $req->title,
            'details' => $req->details,
            
        ]);
        return redirect('information')->with('success', true);
    }
}
