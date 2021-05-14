@extends('admin.layout.master')
@section('title','Add Product Atrribute')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product Atrribute</h1>
                  <small>Product list</small>
               </div>
            </section>
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
            <!-- Main content -->
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
                           <form class="col-sm-6" method="post" action="{{url('/admin/addproduct_atrribute/'.$productDetail->id)}}" enctype="multipart/form-data"> {{csrf_field()}}
                              <input type="hidden" id="product_id" name="product_id" value="{{$productDetail->id}}">  
							  <div class="form-group">
                                 <label>Product Name  :  {{$productDetail->name}}</label>
                              </div>
                              <div class="form-group">
                                 <label>Product Code  :  {{$productDetail->code}}</label>
                              </div>
							  <div class="form-group">
                                 <label>Product Color  :  {{$productDetail->color}}</label>
                              </div>
							  <div class="input_fields_container">
                              <div style="display:flex">
			                       <input type="text" name="sku[]" id="sku" placeholder="SKU" style="margin-right:10px;top-margin:5px">
								   <input type="text" name="size[]" id="size" placeholder="SIZE" style="margin-right:10px;top-margin:5px">
								   <input type="text" name="stock[]" id="stock" placeholder="STOCK" style="margin-right:10px;top-margin:5px">
								   <input type="text" name="price[]" id="price" placeholder="PRICE" style="margin-right:10px;top-margin:5px">
                                 <button class="btn btn-sm btn-primary add_more_button" >Add More Fields</button>
                              </div>
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
         </div>
         <!-- /.content-wrapper -->
         
		 
		 
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
			
			
			<section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Add Product Attributes</h4>
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
                                       
									   <th>Id</th>
                                       <th>SKU</th>
                                       <th>Size</th>
                                       <th>Stock</th>
                                       <th>Price</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach($productAtrtibuteDetails as $productAtrtibuteDetail)
                                    
								 <form class="col-sm-6" method="post" action="{{url('/admin/editproduct_atrribute/'.$productAtrtibuteDetail->id)}}" > {{csrf_field()}}
                            
								 <tr>
									   
                                       <td>
									   
                                         
										 {{$productAtrtibuteDetail->id}}
                                       </td>
                                       <td>
									   <input type="text"  value="{{$productAtrtibuteDetail->sku}}" name="sku" placeholder="Enter Product Name" style="text-align:center;" required>
                                       </td>
                                       <td><input type="text"  value="{{$productAtrtibuteDetail->size}}" name="size" placeholder="Enter Product Name" style="text-align:center;" required>
                                       </td>
                                       <td><input type="text"  value="{{$productAtrtibuteDetail->stock}}" name="stock" placeholder="Enter Product Name" style="text-align:center;" required>
                                       </td>
                                       <td><input type="text"  value="{{$productAtrtibuteDetail->price}}" name="price" placeholder="Enter Product Name" style="text-align:center;" required>
                                       </td>
                                       
									   <td>
									     <button type="submit" class="btn btn-success">Update</button>
										 <a type="button" class="btn btn-danger btn-sm" title="delete Product" href="{{url('/admin/delete_productatrributes/'.$productAtrtibuteDetail->id)}}"><i class="fa fa-trash-o"></i> </a>
                                       
									   </td>
                                    </tr>
                                    
                                 </tbody>
								 </form> 
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