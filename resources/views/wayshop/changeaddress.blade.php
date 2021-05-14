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
                        <h3>Change Address</h3>

                    </div>
                    <form action="/change_Address" method="post"> {{csrf_field()}}
                        
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Your Name</label>
                                <input type="text" class="form-control" name="name" id="InputName" value="{{$userdetails->name}}" placeholder="Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Your Address</label>
                                <input type="text" class="form-control" name="address" id="InputAdress" value="{{$userdetails->address}}" placeholder="Your Address"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Your City</label>
                                <input type="text" class="form-control" name="city" id="InputCity" value="{{$userdetails->city}}" placeholder="Your City"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Your State</label>
                                <input type="text" class="form-control" name="state" id="Inputstate" value="{{$userdetails->state}}" placeholder="Your State"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Your Country</label><br>
                                <select class="form-control" name="country">
								@foreach($country as $countries)
								   <option></option>
								   <option value="{{$countries->country_name}}" @if($countries->country_name == $userdetails->country) selected @endif >{{$countries->country_name}}</option>
								@endforeach   
								</select>
								</div>
                            
							<div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Your Pincode</label>
                                <input type="text" class="form-control" value="{{$userdetails->pincode}}" name="pincode" id="Inputpincode" placeholder="Your Pincode"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Your Mobile</label>
                                <input type="text" class="form-control" value="{{$userdetails->mobile}}" name="mobile" id="Inputmobile" placeholder="Your Mobile"> </div>
                            
                        <button type="submit" class="btn hvr-hover">Save</button>
						
						
                    </form>
                </div>
				</div>
				</div>
@endsection