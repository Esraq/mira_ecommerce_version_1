@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form method="post" action="/banner"  enctype="multipart/form-data">

                              @csrf
                              
                                        <div class="form-group">
                                            <label>Enter Serial No:</label>
                                            <input name="serial_no" class="form-control" />
                                            @if ($errors->first('serial_no'))<div class="alert alert-danger">{!! $errors->first('serial_no') !!}</div> @endif
                                        </div>

                                       
                                        
                                        <div class="form-group">
                                            <label>Enter Banner Image:</label>
                                            <input type="file" name="image" />
                                            @if ($errors->first('image'))<div class="alert alert-danger">{!! $errors->first('image') !!}</div> @endif
                                        </div>
                                    
                                       <input type="submit" value="upload" style="background-color:red; color: white;">






@endsection