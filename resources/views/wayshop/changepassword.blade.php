@extends('wayshop.layout.master')
@section('content')

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
<div class="container">
<div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left"><br><br>
                        <h3>Change Password</h3>

                    </div>
                    <form action="/change_password" method="post"> {{csrf_field()}}
                        
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_Password" placeholder="Old Password"> </div>
                        <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_Password" placeholder="New Password"> </div>
                        
                        <button type="submit" class="btn hvr-hover">Save</button>
						
						
                    </form>
                </div>
				</div>
				</div>
@endsection