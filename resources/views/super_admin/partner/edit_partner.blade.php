@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form action="{{ route('partner.update',$partner->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
                              
                                        <div class="form-group">
                                            <label>Enter Serial No:</label>
                                            <input name="serial_no" value={{$partner->serial_no}} class="form-control" />
                                            @if ($errors->first('partner'))<div class="alert alert-danger">{!! $errors->first('partner') !!}</div> @endif
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Update Image:</label>
                                            <input type="file" name="image" />
                                            @if ($errors->first('image'))<div class="alert alert-danger">{!! $errors->first('image') !!}</div> @endif
                                        </div>
                                        <br> 
     <img src="{{ asset('image/' . $partner->image) }}" alt="" height="90px" width="120">
      <br> <br>
                                    
                                       <input type="submit" value="update" style="background-color:red; color: white;">


</form>



@endsection