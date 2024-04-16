@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form method="POST" action="/update_info/{{$info->id}}">
        @csrf
       
                              
                                        <div class="form-group">
                                            <label>Enter Title:</label>
                                            <input name="title" value={{$info->title}} class="form-control" />
                                            @if ($errors->first('title'))<div class="alert alert-danger">{!! $errors->first('title') !!}</div> @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Details:</label>
                                            <input name="details" value="{{$info->details}}" class="form-control" />
                                            @if ($errors->first('details'))<div class="alert alert-danger">{!! $errors->first('details') !!}</div> @endif
                                        </div>
                                     
                                    
                                       <input type="submit" value="update" style="background-color:red; color: white;">


</form>



@endsection