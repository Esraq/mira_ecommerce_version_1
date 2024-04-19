<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use Session;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function addToCart(Request $req)
    {


         //$a=$req->product_id;
        /// echo $a;

        
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/');

        }
        else
        {
            return redirect('/user_login');
        }

        
      

        
    }

    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    }

    function cartList()
    {
        $userId=Session::get('user')['id'];
       $products= DB::table('carts')
        ->join('stocks','carts.product_id','=','stocks.id')
        ->where('carts.user_id',$userId)
        ->select('stocks.*','carts.id as cart_id')
        ->get();

       /// echo $products;

       return view('cartlist',['products'=>$products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }


}
