@extends('admin.layout.master')
@section('title','view Category')
@section('content')

   <div class="content-wrapper">
		    
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-list"></i>
               </div>
               <div class="header-title">
                  <h1>Category</h1>
                  <small>Category List</small>
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
                                 <h4>Add Category</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add_categories')}}"> <i class="fa fa-plus"></i> Add Category
                                 </a>  
                              </div>
                              
                           </div>
                           <div class="table-responsive">
						      <table id="myTable" class="table table-bordered table-striped table-hover">
                                 
								 <thead>
                                    <tr class="info">
                                       
									   <th>Name</th>
                                       <th>Parent Id</th>
                                       <th>url</th>
                                       <th>Description</th>                                       
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach($categoryDetails as $categoryDetail)
                                    <tr>
									   
                                       <td>{{$categoryDetail->name}}</td>
                                       <td>{{$categoryDetail->parent_id}}</td>
                                       <td>{{$categoryDetail->url}}</td>
                                       <td>{{$categoryDetail->description}}</td>
                                       <td>
									   
									   <input type="checkbox" class="CategoryStatus btn btn-success" rel="{{$categoryDetail->id}}"
									   data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"
									   @if($categoryDetail['status']=="1") checked @endif>
									   <div id="myElem" style="display:none" class="alert alert-success" >Status Enbled
									   
									   <td>
                                          <a type="button" class="btn btn-add btn-sm" title="edit Category" href="{{url('/admin/edit_categories/'.$categoryDetail->id)}}"><i class="fa fa-pencil"></i></a>
                                          <a type="button" class="btn btn-danger btn-sm" title="delete Category" href="{{url('/admin/delete_categories/'.$categoryDetail->id)}}"><i class="fa fa-trash-o"></i> </a>
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

