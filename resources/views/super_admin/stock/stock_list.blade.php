@extends('layouts.super_admin')

@section('content')




<div class="form-group">
                                            <label>Text Input with Placeholder</label>
                                            <input class="form-control" placeholder="PLease Enter Keyword" />
                                        </div>

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
        <th><center><b>Name</b></center></th>
        <th><center><b>Category Name</b></center></th>
        <th><center><b>Price</b></center></th>
        <th><center><b>Size</b></center></th>
        
        <th width="280px"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
      <tr>
 
        <td><center><img src="image/{{$stock->image}}" height="100px" width="100px"></center></td>
        <td><center>{{$stock->name}}</center></td>
        <td><center>{{$stock->category_name}}</center></td>
        <td><center>{{$stock->price}}</center></td>
        <td><center>{{$stock->size}}</center></td>
        <td colspan="2">
                   <center>
        <form action="{{ route('stock.destroy',$stock->id) }}" method="POST">
     
                    
      
     <a class="btn btn-primary" href="{{ route('stock.edit',$stock->id) }}">Edit</a>

     @csrf
     @method('DELETE')

     <button type="submit" class="btn btn-danger">Delete</button>

     <a href="/" class="btn btn-warning">View</a>

</center>

          </td>
      </tr>
      @endforeach
    </tbody>
  </table>









@endsection    