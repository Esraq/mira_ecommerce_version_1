@extends('layouts.master')

@section('content')

<div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                          
                            @foreach($products as $product)
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                    <img src="{{ asset("image/$product->image") }}" alt="Product Image">



                                    </div>
                                  
                                </div>
                                <div class="col-md-7">
                                
                                    <div class="product-content">
                                        <div class="title"><h2>{{$product->name }}</h2></div>
                                        
                                        <div class="price">
    <h4>Price:</h4>
    <p id="price">{{$product->price}}</p>
</div>

                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                              {{$product->size}}
                                            </div> 
                                        </div>
                                        <div class="p-size">
                                        <form action="/add_to_cart" method="POST">
                                @csrf
                                        <h4>Choose:</h4>
                                        <?php
// String containing sizes
$sizes = "x,xl,xxl";

// Split the string by comma
$sizeArray = explode(",", $sizes);
?>

<select name="size">
<option value="N/A">Choose Your Size</option>
    <?php foreach($sizeArray as $size): ?>
        
        <option value="<?php echo $size; ?>"><?php echo strtoupper($size); ?></option>
    <?php endforeach; ?>
</select>
                                        </div>
                                        <div class="action">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
       <button class="btn btn-primary">Add To Cart</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </form>
                        @endforeach
                     
                        
                            
                    <!-- Side Bar Start -->
                    
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->

        <!-- Brand End -->





        











@endsection