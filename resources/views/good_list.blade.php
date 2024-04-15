@extends('layouts.super_admin')

@section('content')




<center>  <h1><b>Product Upload Page<b></h1> </center>

      <br><br>

      @if (session()->has('success'))

<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         Operation Completed Successfully
        </div>
@endif

      <table class="table table-bordered">
    <thead>
        
      <tr>
      <th><center><b>Image</b></center></th>
      <th><center><b>Product</b></center></th>
        <th><center><b>price</b></center></th>
        <th><center><b>category</b></center></th>
        <th><center><b>Size</b></center></th>
        <th width="180px"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
      
        <td><center><img src="image/{{$product->image}}" height="100px" width="100px"></center></td>
        <td><center>{{$product->name}}</center></td>
        <td><center>{{$product->price}}</center></td>
        <td><center>{{$product->category_id}}</center></td>
        <td><center>{{$product->size}}</center></td>
        <td colspan="2">
                   <center>
                   <a class="btn btn-primary" href="{{ route('good.edit',$product->id) }}">Edit</a>

     <button type="submit" class="btn btn-danger">Delete</button>

     <a href="/" class="btn btn-warning">View</a>

</center>

          </td>
      </tr>
      @endforeach
    </tbody>
  </table>









@endsection    