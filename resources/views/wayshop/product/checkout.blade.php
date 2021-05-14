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
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="cart-box-main">
        <div class="container">
    <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate method="post" action="/checkout"> {{csrf_field()}}
                            
                                <div class="mb-3">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="billing_name" name="billing_name" value="{{$userdetails->name}}" placeholder="Your Name" value="" required>
                                    <div class="invalid-feedback"> Valid name is required. </div>
                                </div>
                            
                            <div class="mb-3">
                                <label for="Address">Address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{$userdetails->address}}" placeholder="Your Address" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your address is required. </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{$userdetails->city}}" placeholder="Your City" required>
                                <div class="invalid-feedback"> Please enter your City. </div>
                            </div>
                            <div class="mb-3">
                                <label for="State">State</label>
                                <input type="text" class="form-control" id="billing_state" name="billing_state" value="{{$userdetails->state}}" placeholder="Your State"> </div>
                            
                                <div class="mb-3">
                                    <label for="country">Country</label>
                                    <select class="wide w-100" id="billing_country" name="billing_country">
									@foreach($countries as $country)
									<option @if($country->country_name==$userdetails->country) Selected @endif>{{$country->country_name}}</option>
									@endforeach
								</select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Pincode">Pincode</label>
                                    <input type="text" class="form-control" id="billing_pincode" name="billing_pincode" value="{{$userdetails->pincode}}" placeholder="Your Pincode" required>
                                    <div class="invalid-feedback"> pincode code required. </div>
                                </div>
								<div class="mb-3">
                                    <label for="Pincode">Mobile</label>
                                    <input type="text" class="form-control" id="billing_mobile" name="billing_mobile" value="{{$userdetails->mobile}}" placeholder="Your Mobile" required>
                                    <div class="invalid-feedback"> mobile number required. </div>
                                </div>
                            
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                           
                            <hr class="mb-1"> 
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    
                        
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Shipping address</h3>
                        </div>
                        
                            
                                <div class="mb-3">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="shipping_name" name="shipping_name" placeholder="Your Name" required>
                                    <div class="invalid-feedback"> Valid name is required. </div>
                                </div>
                                
                            <div class="mb-3">
                                <label for="Address">Address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="shipping_address" name="shipping_address"placeholder="Your Address" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your address is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="shipping_city" name="shipping_city"placeholder="Your City" required>
                                <div class="invalid-feedback"> Please enter your City. </div>
                            </div>
                            <div class="mb-3">
                                <label for="State">State</label>
                                <input type="text" class="form-control" id="shipping_state" name="shipping_state" placeholder="Your State"> </div>
                            
                                <div class="mb-3">
                                    <label for="country">Country</label>
                                    <select class="wide w-100" id="shipping_country" name="shipping_country" value="{{$userdetails->country}}" >
									@foreach($countries as $country)
									<option @if($country->country_name==$userdetails->country) Selected @endif>{{$country->country_name}}</option>
									@endforeach
								</select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Pincode">Pincode</label>
                                    <input type="text" class="form-control" id="shipping_pincode" name="shipping_pincode" placeholder="Your Pincode" required>
                                    <div class="invalid-feedback"> pincode code required. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="Pincode">Mobile</label>
                                    <input type="text" class="form-control" id="shipping_mobile" name="shipping_mobile" placeholder="Your Mobile" required>
                                    <div class="invalid-feedback"> mobile number required. </div>
                                </div>
                            
                             
                            
                            <hr class="mb-1"> 
                    </div>
                </div>
                        
                        
                        </div>
                <div class="col-12 d-flex shopping-box"> <button type="submit" class="ml-auto btn hvr-hover">Next</button> </div>
                    </form>
				</div>
            </div>
			</div>
			</div>

@endsection