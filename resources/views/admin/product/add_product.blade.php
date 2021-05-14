@extends('admin.layout.master')
@section('title','Add Product')
@section('content')

 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product</h1>
                  <small>Product list</small>
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
                           <form class="col-sm-6" method="post" action="{{url('/admin/add_product')}}" enctype="multipart/form-data"> {{csrf_field()}}
                              <div class="form-group">
							    <label>Under Category</label>
                                <select class="form-control" name="category_id" id="category_id">
								
								<?php echo $categories_dropdown; ?>
								</select>
							  </div>
							  <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" class="form-control" name="product_code" placeholder="Enter Product Code" required>
                              </div>
							  <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="text" class="form-control" name="product_color" placeholder="Enter Product Color" required>
                              </div>
							  <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea type="text" class="form-control" name="product_description">
                                      Description
                                 </textarea>
							  </div>
							  <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Product Image</label>
                                 <input type="file" name="product_image" >
                              </div>
                              <div class="reset-button">
                                 
                                 <button type="submit" class="btn btn-success">Save</button>
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
