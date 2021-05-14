@extends('admin.layout.master')
@section('title','Edit Category')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-list"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Category</h1>
                  <small>Edit Category</small>
               </div>
            </section>
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
                              <a class="btn btn-add " href="{{url('/admin/view_categories')}}"> 
                              <i class="fa fa-list"></i>  Category List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="post" action="{{url('/admin/edit_categories/$categoryDetails->id')}}" > {{csrf_field()}}
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control" value="{{$categoryDetails->name}}" name="category_name" placeholder="Enter Category Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Parent Category</label>
								 <select class="form-control" id="parent_id" name="parent_id">
								 
                                 <option value="0">Parent Category</option>
                                 @foreach($level as $levels)
								  <option value="{{$levels->id}}">{{$levels->name}}</option>
								 @endforeach									 
								 </select>
                                 
                              </div>
                              <div class="form-group">
                                 <label>URL</label>
                                 <input type="text" class="form-control" value="{{$categoryDetails->url}}" name="category_url" placeholder="Enter Category url" required>
                              </div>
							  <div class="form-group">
                                 <label>Category Description</label>
                                 <textarea type="text" class="form-control" value="" name="category_description">
                                      {{$categoryDetails->description}}
                                 </textarea>
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