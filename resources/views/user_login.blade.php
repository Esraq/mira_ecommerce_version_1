@extends('layouts.master')

@section('content')



<div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                        <form action="/user_registration" method="POST" >
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Full Name">
                                </div>
                                
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="text" placeholder="E-mail">
                                </div>
                               
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                               
                                <div class="col-md-12">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
</form>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                        <form action="user_login" method="POST" >
                        @csrf
                            <div class="row">
                            
                <div class="form-group">
                    
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>









@endsection