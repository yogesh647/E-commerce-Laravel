@extends('admin.layout.master')
@section('title','View Order')
@section('content')

<div class="content-wrapper">
		    
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Order</h1>
                  <small>Order List</small>
               </div>
            </section>
            <!-- Main content -->
			<div id="message_success" style="display:none" class="alert alert-success">Status Enabled</div>
            <div id="message_error" style="display:none" class="alert alert-danger">Status Disabled</div>
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
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Add Product</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        
                           
                           <div class="table-responsive">
						   
                              <table id="myTable" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       
									   <th>Order ID</th>
                                       <th>Order Date</th>
                                       <th>Customer Name</th>
                                       <th>Customer Email</th>
                                       <th>Order Product</th>
                                       <th>Order Amount</th>                                       
                                       <th>Order Status</th>
                                       <th>Payment Method</th>
									   <th>Action</th>
									   
									   
                                    </tr>
                                 </thead>
								 @foreach($orderProduct as $orderProducts)
                                 <tbody>
								 
                                    <tr>
									   
                                       <td>{{$orderProducts->id}}</td>
                                       <td>{{$orderProducts->created_at}}</td>
                                       <td>{{$orderProducts->name}}</td>
                                       <td>{{$orderProducts->user_email}}</td>
									   <td>
									   @foreach($orderProducts->orders as $pro)
                                       {{$pro->product_name}}<br>
                                       @endforeach
									   </td>
									   <td>{{$orderProducts->grand_total}}</td>
									   <td>{{$orderProducts->order_status}}</td>
                                       <td>{{$orderProducts->payment_method}}</td>
									   <td>
									      <a type="button" class="btn btn-warning btn-sm" href="/admin/view_order_details/{{$orderProducts->id}}">View Details</a><br>
									      <a type="button" class="btn btn-success btn-sm" href="/admin/invoice_order/{{$orderProducts->id}}">Invoice Order</a>
									   
									   </td>
                                    </tr>
                                    
                                 </tbody>
								@endforeach
                              </table>
							  
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                           
            </section>
         </div>
        


@endsection