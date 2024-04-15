@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
                              
              
                                        <div class="form-group">
                                            <label>Category Name:</label>
                                            <input name="category_name" value={{$category->category_name}} class="form-control" />
                                            @if ($errors->first('category_name'))<div class="alert alert-danger">{!! $errors->first('category_name') !!}</div> @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Select Icon Type</label>
                                            <select name="icon" class="form-control">
                                            <option value="{{$category->icon}}">{{$category->category_name}}</option>
                                            <option value="fa fa-shopping-home">Home</option>
                                                <option value="fa fa-shopping-bag">bag</option>
                                                <option value="fa fa-shopping-alt">alt</option>
                                                <option value="fa fa-female">female</option>
                                                <option value="fa fa-child">child</option>
                                                <option value="fa fa-tshirt">tshirt</option>
                                                <option value="fa fa-mobile">mobile</option>
                                                <option value="fa fa-microchip">microship</option>
                                              
                                            </select>
                                        </div>

                                       
                                        
                                       <input type="submit" value="update" style="background-color:red; color: white;">





               




@endsection