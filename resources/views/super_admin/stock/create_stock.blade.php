@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form method="post" action="/stock"  enctype="multipart/form-data">

                              @csrf
                              
                                        <div class="form-group">
                                            <label>Enter Name:</label>
                                            <input name="name" class="form-control" />
                                            @if ($errors->first('name'))<div class="alert alert-danger">{!! $errors->first('name') !!}</div> @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Price:</label>
                                            <input name="price" class="form-control" />
                                            @if ($errors->first('price'))<div class="alert alert-danger">{!! $errors->first('price') !!}</div> @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Size:</label>
                                            <input name="size" class="form-control" />
                                            @if ($errors->first('size'))<div class="alert alert-danger">{!! $errors->first('size') !!}</div> @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Select Category:</label>
                                            <select name="category_name" class="form-control">
                                            <option value="N/A">Not Choosen</option>
                                            @foreach($categories as $items)
                                            <option value="{{$items->category_name}}">{{$items->category_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Enter Image:</label>
                                            <input type="file" name="image" />
                                            @if ($errors->first('image'))<div class="alert alert-danger">{!! $errors->first('image') !!}</div> @endif
                                        </div>
                                    
                                       <input type="submit" value="upload" style="background-color:red; color: white;">






@endsection