@extends('admin.layout.master')
@section('title','View Order')
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-outdent"></i>
               </div>
               <div class="header-title">
                  <h1>Order</h1>
                  <small>Order list</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  
                  <div class="col-sm-6">
                     <div class="panel lobidisable panel-bd">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Order Details</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                 @foreach($orderProduct as $orderProducts)
                                 <tbody>
                                    <tr>
                                       <td>Order Date</td>
                                       <td>{{$orderProducts->created_at}}</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>Order Amount</td>
                                       <td>{{$orderProducts->grand_total}}</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>Shipping Charge</td>
                                       <td>{{$orderProducts->shipping_charges}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Coupon Amount</td>
                                       <td>{{$orderProducts->coupon_amount}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Coupon Code</td>
                                       <td>{{$orderProducts->coupon_code}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Order Status</td>
                                       <td>{{$orderProducts->order_status}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Payment Method</td>
                                       <td>{{$orderProducts->payment_method}}</td>
                                       
                                    </tr>
                                 </tbody>
								 @endforeach
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class="col-sm-6">
                     <div class="panel lobidisable panel-bd">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Customer Details</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                 @foreach($orderProduct as $orderProducts)
                                 <tbody>
                                    <tr>
                                       <td>Customer Name</td>
                                       <td>{{$orderProducts->name}}</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>Customer Email</td>
                                       <td>{{$orderProducts->user_email}}</td>
                                       
                                    </tr>
                                 </tbody>
								 @endforeach
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class="col-sm-6">
                     <div class="panel lobidisable panel-bd">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Order Status</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                 @foreach($orderProduct as $orderProducts)
                                 <tbody>
                                    <tr>
                                       
                                       
                                    </tr>
                                    <tr>
                                       <td>
								<form action="/admin/orderStatus" method="post"> {{@csrf_field()}}	   
                                <div class="form-group">
								<input type="hidden" name="order_id" value="{{$orderProducts->id}}">
                                 <label>Order Status</label>
								 <select class="form-control" name="order_status" value="{{$orderProducts->order_status}}">
								   <option @if($orderProducts->order_status=="New") selected @endif value="New" >New</option>
								   <option @if($orderProducts->order_status=='In Progress') selected @endif value='In Progress' >In Progress</option>
								   <option @if($orderProducts->order_status=='Paid') selected @endif value='Paid'>Paid</option>
								   <option @if($orderProducts->order_status=='UnPaid') selected @endif value='UnPaid'>UnPaid</option>
								   <option @if($orderProducts->order_status=='In Shipping') selected @endif value='In Shipping'>In Shipping</option>
                                   </select>
                                 </div>
								 <button type="submit">update</button>
								 </form>
									   </td>
									   
							  
                                       
                                    </tr>
                                 </tbody>
								 @endforeach
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class="col-sm-6">
                     <div class="panel lobidisable panel-bd">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Billing Address Details</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                 @foreach($orderProduct as $orderProducts)
                                 <tbody>
                                    <tr>
                                       <td>Name</td>
                                       <td>{{$orderProducts->name}}</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>Email</td>
                                       <td>{{$orderProducts->user_email}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Address</td>
                                       <td>{{$orderProducts->address}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>City</td>
                                       <td>{{$orderProducts->city}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>State</td>
                                       <td>{{$orderProducts->state}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Country</td>
                                       <td>{{$orderProducts->country}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Pincode</td>
                                       <td>{{$orderProducts->pincode}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Mobile</td>
                                       <td>{{$orderProducts->mobile}}</td>
                                       
                                    </tr>
                                 </tbody>
								 @endforeach
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
				  <div class="col-sm-6">
                     <div class="panel lobidisable panel-bd">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Shipping Address Details</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                 @foreach($orderProduct as $orderProducts)
                                 <tbody>
                                    <tr>
                                       <td>Name</td>
                                       <td>{{$orderProducts->name}}</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>Email</td>
                                       <td>{{$orderProducts->user_email}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Address</td>
                                       <td>{{$orderProducts->address}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>City</td>
                                       <td>{{$orderProducts->city}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>State</td>
                                       <td>{{$orderProducts->state}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Country</td>
                                       <td>{{$orderProducts->country}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Pincode</td>
                                       <td>{{$orderProducts->pincode}}</td>
                                       
                                    </tr>
									<tr>
                                       <td>Mobile</td>
                                       <td>{{$orderProducts->mobile}}</td>
                                       
                                    </tr>
                                 </tbody>
								 @endforeach
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
               <div class="modal fade" id="delup" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-flag m-r-5"></i> Update Department</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Serial</label>
                                          <input type="number" placeholder="serial" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Designation</label>
                                          <input type="text" placeholder="Designation" class="form-control">
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                             <button type="submit" class="btn btn-add btn-sm">Update</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
               <!-- Modal -->    
               <!-- Delete dep[artments Modal2 -->
               <div class="modal fade" id="delt" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-flag m-r-5"></i> Delete Department</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Departments</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-add btn-sm">YES</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
            </section>
            <!-- /.content -->
         </div>

@endsection