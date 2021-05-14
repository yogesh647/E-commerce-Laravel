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
                    <h2>ORDER DETAILS</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Order Summary</li>
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
                            
                                <div class="mb-3">
                                    <label for="Name">Name :- {{$billingdetails->name}}</label>
                                </div>
                            
                            <div class="mb-3">
                                <label for="Address">Address :- {{$billingdetails->address}}</label>
                                
                            </div>
                            
                            <div class="mb-3">
                                <label for="City">City :- {{$billingdetails->city}}</label>
                                </div>
                            <div class="mb-3">
                                <label for="State">State :- {{$billingdetails->state}}</label>
                                </div>
                            <div class="mb-3">
                                <label for="City">Country :- {{$billingdetails->country}}</label>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Pincode">Pincode :- {{$billingdetails->pincode}}</label>
                                    </div>
								<div class="mb-3">
                                    <label for="Pincode">Mobile :- {{$billingdetails->mobile}}</label>
                                    </div>
                            
                            
                            
                            <hr class="mb-4">
                            
                            
                            
                            
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">   
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Shipping address</h3>
                        </div>
                          <div class="mb-3">
                                    <label for="Name">Name :- {{$shippingDetails->name}}</label>
                                </div>
                            
                            <div class="mb-3">
                                <label for="Address">Address :- {{$shippingDetails->address}}</label>
                                
                            </div>
                            
                            <div class="mb-3">
                                <label for="City">City :- {{$shippingDetails->city}}</label>
                                </div>
                            <div class="mb-3">
                                <label for="State">State :- {{$shippingDetails->state}}</label>
                                </div>
                            
                            <div class="mb-3">
                                <label for="State">Country :- {{$shippingDetails->country}}</label>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Pincode">Pincode :- {{$shippingDetails->pincode}}</label>
                                    </div>
								<div class="mb-3">
                                    <label for="Pincode">Mobile :- {{$shippingDetails->mobile}}</label>
                                    </div>  
                            <hr class="mb-1"> 
                    </div>
                </div>
                        
                        
                        </div>
						<!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
							<?php $totalamount=0;
							      ?>
							@foreach($CartDetails as $CartDetail)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="/upload/product/{{$CartDetail->image}}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
										{{$CartDetail->product_name}}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>RS {{$CartDetail->price}}</p>
                                    </td>
                                    <td class="quantity-box">{{$CartDetail->quantity}}</td>
                                    <td class="total-pr">
                                        <p>RS {{$CartDetail->quantity*$CartDetail->price}}</p>
                                        <?php $totalamount=$totalamount+($CartDetail->quantity*$CartDetail->price)?>
									</td>
                                    
                                </tr>
                                
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row my-5">
                
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
						
						@if(Session::get('couponamount'))
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> RS <?php echo $totalamount;?> </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold">RS <?php echo Session::get('couponamount');?> </div>
                        </div>
              
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">RS <?php $totalamount=$totalamount-Session::get('couponamount');
							     echo $totalamount;
							?> </div>
                        </div>
						@else 
						<div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">RS <?php echo $totalamount;?> </div>
                        </div>
                        @endif						
                        <hr> </div>
                </div>
                
				</div>
                <div class="col-lg-8 col-sm-12">
				<form id="paymentform" name="paymentform" action="/place_order" method="post"> {{csrf_field() }}
				<div class="title"> <span>Payment</span> </div>
				<div class="d-block my-3">
				                <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $totalamount;?>">
                                <div class="custom-control custom-radio">
                                    <input id="cod" name="paymentMethod" type="radio" value="cod" class="custom-control-input">
                                    <label class="custom-control-label" for="cod">COD</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" value="paypal" class="custom-control-input">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
								<div class="col-12 d-flex shopping-box"> <button  type="submit" class="ml-auto btn hvr-hover" onclick="return selectpayment();">Placed Order</button> </div>
                    </form>
                            </div>
							
				</div>
        </div>
    </div>
    <!-- End Cart -->

                    
				</div>
            </div>
			</div>
			</div>

@endsection