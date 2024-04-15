@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form action="{{ route('stock.update',$stock->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
                                        <div class="form-group">
                                            <label>Enter Name:</label>
                                            <input name="name" value="{{$stock->name}}" class="form-control" />
                                            @if ($errors->first('name'))<div class="alert alert-danger">{!! $errors->first('name') !!}</div> @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Price:</label>
                                            <input name="price" value="{{$stock->price}}" class="form-control" />
                                            @if ($errors->first('price'))<div class="alert alert-danger">{!! $errors->first('price') !!}</div> @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Size:</label>
                                            <input name="size" value="{{$stock->size}}" class="form-control" />
                                            @if ($errors->first('size'))<div class="alert alert-danger">{!! $errors->first('size') !!}</div> @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Select Category:</label>
                                            <select name="category_name" class="form-control">
                                            <option value="{{$stock->category_name}}">{{$stock->category_name}}</option>
                                            @foreach($categories as $items)
                                            <option value="{{$items->category_name}}">{{$items->category_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        
                                       

                                        <div class="form-group">
                                            <label>Update  Image:</label>
                                            <input type="file" name="image" />
                                            @if ($errors->first('image'))<div class="alert alert-danger">{!! $errors->first('image') !!}</div> @endif
                                        </div>
                                        <br> 
     <img src="{{ asset('image/' . $stock->image) }}" alt="" height="90px" width="120">
      <br> <br>








                                    
                                       <input type="submit" value="update" style="background-color:red; color: white;">






@endsection