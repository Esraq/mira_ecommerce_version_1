@extends('layouts.master')

@section('content')



<div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>

                                <form action="/orderplace" method="POST" >
              @csrf
                                <div class="row">
                                    
                                  
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" name="address" type="text" placeholder="Address" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Payment Method</label>
                                        <select name="payment" class="custom-select">
                                         
                                            <option value="Cash On Delivery">Cash On Delivery</option>
                                            <option value="bkash">Bkash</option>
                                            <option value="nagad">Nagad</option>
                                        </select>
                                    </div>
                                   

                                    
                                </div>
                                <input type="submit" value="Confirm" style="background-color: purple; color: white;">

                                </form>
                            </div>

                           
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>















@endsection