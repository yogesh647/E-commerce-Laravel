@extends('admin.layout.master')
@section('title','Edit Product')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Product</h1>
                  <small>Edit Product</small>
               </div>
            </section>
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
                           <form class="col-sm-6" method="post" action="{{url('/admin/edit_product/'.$productDetails->id)}}" enctype="multipart/form-data"> {{csrf_field()}}
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control" value="{{$productDetails->name}}" name="product_name" placeholder="Enter Product Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" class="form-control" value="{{$productDetails->code}}" name="product_code" placeholder="Enter Product Code" required>
                              </div>
							  <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="text" class="form-control" value="{{$productDetails->color}}" name="product_color" placeholder="Enter Product Color" required>
                              </div>
							  <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea type="text" class="form-control" name="product_description">
                                      {{$productDetails->description}}
                                 </textarea>
							  </div>
							  <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="text" class="form-control" value="{{$productDetails->price}}" name="product_price" placeholder="Enter Product Price" required>
                              </div>
                              
                              <div class="form-group">
                                 @if(!empty($productDetails->image))
								 <img src="/upload/product/{{$productDetails->image}}" alt="User Image" width="80" height="80"><br>                                 
								 @endif
								 <input type="file"  name="product_image" >
								 <input type="hidden" value="{{$productDetails->image}}" name="old_image">
								 
                              </div>
                              <div class="reset-button">
                                 
                                 <button type="submit" class="btn btn-success">Update</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->


@endsection