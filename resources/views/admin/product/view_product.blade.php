@extends('admin.layout.master')
@section('title','Product List')
@section('content')

         
         <div class="content-wrapper">
		    
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Product</h1>
                  <small>Product List</small>
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
                        
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add_product')}}"> <i class="fa fa-plus"></i> Add Product
                                 </a>  
                              </div>
                              
                           </div>
                           <div class="table-responsive">
						   
                              <table id="myTable" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       
									   <th>Image</th>
                                       <th>Name</th>
                                       <th>Code</th>
                                       <th>color</th>
                                       <th>description</th>
                                       <th>Price</th>                                       
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach($productDetails as $productDetail)
                                    <tr>
									   
                                       <td><img src="/upload/product/{{$productDetail->image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$productDetail->name}}</td>
                                       <td>{{$productDetail->code}}</td>
                                       <td>{{$productDetail->color}}</td>
                                       <td>{{$productDetail->description}}</td>
                                       <td>{{$productDetail->price}}</td>
                                       <td>
									   
									   <input type="checkbox" class="ProductStatus btn btn-success" rel="{{$productDetail->id}}"
									   data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"
									   @if($productDetail['status']=="1") checked @endif>
									   <div id="myElem" style="display:none" class="alert alert-success" >Status Enbled
									   
									   <td>
									      <a type="button" class="btn btn-warning btn-sm" title="Add Image" href="{{url('/admin/add_products_image/'.$productDetail->id)}}"><i class="fa fa-image"></i></a>
									      <a type="button" class="btn btn-pink btn-sm" title="Add Atrribute" href="{{url('/admin/addproduct_atrribute/'.$productDetail->id)}}"><i class="fa fa-product-hunt"></i></a>
                                          <a type="button" class="btn btn-add btn-sm" title="edit Product" href="{{url('/admin/edit_product/'.$productDetail->id)}}"><i class="fa fa-pencil"></i></a>
                                          <a type="button" class="btn btn-danger btn-sm" title="delete Product" href="{{url('/admin/delete_product/'.$productDetail->id)}}"><i class="fa fa-trash-o"></i> </a>
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
