@extends('wayshop.layout.master')
@section('content')


    <div class="contact-box-main">
        <div class="container">
                <h1> =======> Your Order <=====</h1>
                <div>
                    <div class="contact-form-right">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name(Code)</th>
									<th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Grand Total</th>
									<th>Action</th>
                                </tr>
                            </thead>
							@foreach($orderDetails as $orderDetail)
                            <tbody>
                                <tr>
								    <td>{{$orderDetail->id}}</td>
									
                                    <td class="thumbnail-img">
									@foreach($orderDetail->orders as $pro)
                                        <a href="/user_order_details/{{$pro->id}}">
										{{$pro->product_name}}({{$pro->product_code}})<br>
									    </a>
									@endforeach	
                                    </td>
									
									<td>{{$orderDetail->created_at}}</td>
									<td>{{$orderDetail->payment_method}}</td>
                                    <td>{{$orderDetail->grand_total}}</td>
                                    <td class="thumbnail-img">
									{{$orderDetail->order_status}}
                                    </td>
                                </tr>
                                
                                
                            </tbody>
							@endforeach
                        </table>					
					</div>
                </div>
           
        </div>
    </div>
    <!-- End Cart -->
@endsection