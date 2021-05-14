@extends('admin.layout.master')
@section('title','Add Banner')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Banner</h1>
                  <small>Banner list</small>
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
                              <a class="btn btn-add " href="{{url('/admin/viewbanner')}}"> 
                              <i class="fa fa-list"></i>  Banner List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="post" action="{{url('/admin/addbanner')}}" enctype="multipart/form-data"> {{csrf_field()}}
                              
							  <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="banner_name" placeholder="Enter Banner Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Text Style</label>
                                 <input type="text" class="form-control" name="banner_text-style" placeholder="Enter Text_style" required>
                              </div>
							  <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" class="form-control" name="banner_link" placeholder="Enter Banner link" required>
                              </div>
							  <div class="form-group">
                                 <label>Content</label>
                                 <textarea type="text" class="form-control" name="banner_content">
                                      Content
                                 </textarea>
							  </div>
							  <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control" name="banner_sort-order" placeholder="Enter banner sort order" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <input type="file" name="banner_image" >
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