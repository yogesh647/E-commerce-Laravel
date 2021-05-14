@extends('admin.layout.master')
@section('title','Add Product Image')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product Image</h1>
                  <small>Product Image</small>
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
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/admin/view_product')}}"> 
                              <i class="fa fa-list"></i>  Product List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
						@foreach($productDetails as $productDetail)
                           <form class="col-sm-6" method="post" action="{{url('/admin/add_products_image/'.$productDetail->id)}}" enctype="multipart/form-data"> {{csrf_field()}}
                              <input type="hidden" name="product_id" id="product_id" value="{{$productDetail->id}}">
							  <div class="form-group">
                                 <label>Product Name : {{$productDetail->name}}</label>
                              </div>
                              <div class="form-group">
                                 <label>Product Code : {{$productDetail->code}}</label>
                              </div>
							  <div class="form-group">
                                 <label>Product Color : {{$productDetail->color}}</label>
                              </div>
							  
                              <div class="form-group">
                                 <label>Product Image</label>
                                 <input type="file" name="product_image[]" multiple="multiple">
                              </div>
                              <div class="reset-button">
                                 
                                 <button type="submit" class="btn btn-success">Save</button>
                              </div>
                           </form>
						   @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         
         <!-- /.content-wrapper -->

            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Product Image</h1>
                  <small>Product Image List</small>
               </div>
            </section>
            <!-- Main content -->
			
			
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
                                       <th>Product ID</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
							     @foreach($productimageDetails as $productimageDetail)	 
                                    <tr>
									   
                                       <td><img src="/upload/product/{{$productimageDetail->image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$productimageDetail->product_id}}</td>
                                       <td>
									      <a type="button" class="btn btn-danger btn-sm" title="delete Product" href="{{url('/admin/delete_product_image/'.$productimageDetail->id)}}"><i class="fa fa-trash-o"></i> </a>
                                       </td>
                                    </tr>
                                 @endforeach   
                                 </tbody>
								 
                              </table>
							  
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                           
            </section>
         </div>
        


@endsection