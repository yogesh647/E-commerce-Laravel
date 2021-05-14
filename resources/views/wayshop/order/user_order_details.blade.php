@extends('wayshop.layout.master')
@section('content')


    <div class="contact-box-main">
        <div class="container">
                <h1> =======> Your Order Details<=====</h1>
                <div>
                    <div class="contact-form-right">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
							@foreach($orderDetails as $orderDetail)
                            <tbody>
                                <tr>
								    <td>{{$orderDetail->id}}</td>
                                    <td class="thumbnail-img">
                                        <a href="/user_order_details/{{$orderDetail->id}}">
										{{$orderDetail->product_name}}
									    </a>
                                    </td>
									<td>{{$orderDetail->product_code}}</td>
									<td>{{$orderDetail->product_color}}</td>
                                    <td>{{$orderDetail->product_size}}</td>
                                    <td>{{$orderDetail->product_qty}}</td>
									
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