@extends('admin.layout.master')
@section('title','Edit Coupon')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Coupon</h1>
                  <small>edit Coupon</small>
               </div>
            </section>
            <!-- Main content -->
			<!-- Main content -->
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
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/admin/viewcoupon')}}"> 
                              <i class="fa fa-list"></i>  Coupon List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
						  @foreach($coupondetails as $coupondetail)
                           <form class="col-sm-6" method="post" action="/admin/editcoupon/{{$coupondetail->id}}" > {{csrf_field()}}
                              
							  <div class="form-group">
                                 <label>Coupon Code</label>
                                 <input type="text" class="form-control" value="{{$coupondetail->coupon_code}}" name="coupon_code" placeholder="Enter coupon code" required>
                              </div>
                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" value="{{$coupondetail->amount}}" name="coupon_amount" placeholder="Enter coupon amount" required>
                              </div>
							  <div class="form-group">
                                 <label>Amount type</label>
								 <select class="form-control" name="amount_type" value="{{$coupondetail->amount_type}}">
								   <option @if($coupondetail->amount_type=="Fixed") selected @endif value="Fixed">Fixed</option>
								   <option @if($coupondetail->amount_type=="Percentage") selected @endif value="Percentage">Percentage</option>
                                   </select>
                                 </div>
							  
							  <div class="form-group">
                                 <label>Expiry Date</label>
                                 <input type="date" class="form-control" name="expiry_date" value="{{$coupondetail->expiry_date}}" placeholder="Enter expiry date" required>
                              </div>
                              
                              
                              <div class="reset-button">
                                 
                                 <button type="submit" class="btn btn-success">Update</button>
                              </div>
                           </form>
						   @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->


@endsection