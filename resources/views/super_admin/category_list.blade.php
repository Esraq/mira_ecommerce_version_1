@extends('layouts.super_admin')

@section('content')




<center>  <h1><b>Category Upload Page<b></h1> </center>

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
      <th><center><b>Name</b></center></th>
        <th><center><b>Icon</b></center></th>
       
        
        <th width="280px"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $categories)
      <tr>
      <td><center>{{$categories->category_name}}</center></td>
        
        <td><center>{{$categories->icon}}</center></td>
      
        <td colspan="2">
                   <center>
        <form action="{{ route('category.destroy',$categories->id) }}" method="POST">
     
                    
      
     <a class="btn btn-primary" href="{{ route('category.edit',$categories->id) }}">Edit</a>

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