@extends('layouts.master')

@section('content')


<div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                          
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="image/{{$product->image}}" alt="Image"></a>
                                                    <p>{{$product->name}}</p>
                                                </div>
                                            </td>
                                            <td>{{$product->price}}</td>
                                            
                                            <td>{{$product->price}}</td>
                                            <td>
                                             
                                            <a href="/removecart/{{$product->cart_id}}">
  <button><i class="fa fa-trash"></i></button>
</a>





                                            </td>
                                        </tr>
                                        
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                          
                                            <h2>Grand Total<span>{{$total}}</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            
                                        <a href="/ordernow" class="button_class">
  <button>Place Order</button>
</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>













@endsection