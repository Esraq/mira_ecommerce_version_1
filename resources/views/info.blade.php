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
      <th><center><b>Title</b></center></th>
        <th><center><b>Details</b></center></th>
       
        
        <th width="280px"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($informations as $information)
      <tr>
      <td><center>{{$information->title}}</center></td>
        
        <td><center>{{$information->details}}</center></td>
      
        <td colspan="2">
                   <center>
       
     
                    
      
     <a class="btn btn-primary" href="edit_info/{{$information->id}}">Edit</a>

     

     <a href="/" class="btn btn-warning">View</a>

</center>

          </td>
      </tr>
      @endforeach
    </tbody>
  </table>









@endsection    