@extends('layouts.super_admin')

@section('content')




<center>  <h1><b>Banner Upload Page<b></h1> </center>

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
      <th><center><b>Serial No</b></center></th>
        <th><center><b>Image</b></center></th>
        <th><center><b>slogan</b></center></th>
        
        <th width="280px"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
      <tr>
      <td><center>{{$banner->serial_no}}</center></td>
        <td><center><img src="image/{{$banner->image}}" height="100px" width="100px"></center></td>
        <td><center>{{$banner->slogan}}</center></td>
      
        <td colspan="2">
                   <center>
        <form action="{{ route('banner.destroy',$banner->id) }}" method="POST">
     
                    
      
     <a class="btn btn-primary" href="{{ route('banner.edit',$banner->id) }}">Edit</a>

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