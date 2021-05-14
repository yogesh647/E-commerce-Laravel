@extends('wayshop.layout.master')
@section('content')
<div class="container">
@if(Session::has('flash_message_error'))
				<div class="alert alert-sm alert-danger alert-block" role="alert">
			    <button type="button" class="close" date-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<strong>{{ session('flash_message_error')}}</strong>
				</div>
			@endif
			
			@if(Session::has('flash_message_success'))
				<div class="alert alert-sm alert-success alert-block" role="alert">
			    <button type="button" class="close" date-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<strong>{{ session('flash_message_success') }}</strong>
				</div>
			@endif
<div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left"><br><br>
                        <h3>Account Login</h3>

                    </div>
                    <form action="/login" method="post"> {{csrf_field()}}
                        
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password"> </div>
                        
                        <button type="submit" class="btn hvr-hover">Login</button>
						
						
                    </form>
                </div>
				
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left"><br><br>
                        <h3>Create New Account</h3>
                    </div>
                    <form action="/registeruser" method="post"> {{ csrf_field()}}
                        
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="InputName" placeholder="First Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="InputLastname" placeholder="Last Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" name="email" id="InputEmail1" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password"> </div>
                        
                        <button type="submit" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div>
			</div>
@endsection