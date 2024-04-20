<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use App\Models\Stock;

use Session;

use App\Models\Order;

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
           $cart->size=$req->size;
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
        $total= $stocks= DB::table('carts')
        ->join('stocks','carts.product_id','=','stocks.id')
        ->where('carts.user_id',$userId)
        ->sum('stocks.price');

        view()->share('total',$total);

       /// echo $products;

       return view('cartlist',['products'=>$products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function productDetails($id)
    {
        $products = Stock::select("*")
        ->where("id", "=",$id)
        ->get();
        view()->share('products',$products);
        return view('product_details');
    }
     
    function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total= $stocks= DB::table('carts')
         ->join('stocks','carts.product_id','=','stocks.id')
         ->where('carts.user_id',$userId)
         ->sum('stocks.price');
 
         return view('ordernow',['total'=>$total]);
    }




    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
        
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->size=$cart['size'];
             $order->mobile_no=$cart['mobile_no'];
             $order->postal_code=$cart['postal_code'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->mobile_no=$req->mobile_no;
             $order->postal_code=$req->postal_code;
             $order->save();
             Cart::where('user_id',$userId)->delete(); 
         }
         $req->input();
         return redirect('/');
    }


    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();

         echo $orders;
 
         ///return view('myorders',['orders'=>$orders]);
    }


}
