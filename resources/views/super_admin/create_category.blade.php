@extends('layouts.super_admin')

@section('content')


<div id="page-inner">
<div class="row">
                    
<div class="panel-body">
                            <div class="row">

                            <form method="post" action="/category"  enctype="multipart/form-data">

                              @csrf
                              
                                       

                                        <div class="form-group">
                                            <label>Enter Category  Name:</label>
                                            <input name="category_name" class="form-control" />
                                            @if ($errors->first('category_name'))<div class="alert alert-danger">{!! $errors->first('category_name') !!}</div> @endif
                                        </div>

                                        

                                        <div class="form-group">
                                            <label>Select Icon Type</label>
                                            <select name="icon" class="form-control">
                                            <option value="N/A">Not Choosen</option>
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

                                       
                                    
                                       <input type="submit" value="upload" style="background-color:red; color: white;">






@endsection