@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
                              
                                        <div class="form-group">
                                            <label>Enter Serial No:</label>
                                            <input name="serial_no" value={{$banner->serial_no}} class="form-control" />
                                            @if ($errors->first('serial_no'))<div class="alert alert-danger">{!! $errors->first('serial_no') !!}</div> @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Slogan:</label>
                                            <input name="slogan" value="{{$banner->slogan}}" class="form-control" />
                                            @if ($errors->first('slogan'))<div class="alert alert-danger">{!! $errors->first('serial_no') !!}</div> @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Update Banner Image:</label>
                                            <input type="file" name="image" />
                                            @if ($errors->first('image'))<div class="alert alert-danger">{!! $errors->first('image') !!}</div> @endif
                                        </div>
                                        <br> 
     <img src="{{ asset('image/' . $banner->image) }}" alt="" height="90px" width="120">
      <br> <br>
                                    
                                       <input type="submit" value="update" style="background-color:red; color: white;">






@endsection