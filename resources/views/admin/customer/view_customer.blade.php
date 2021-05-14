@extends('admin.layout.master')
@section('title','View Customer')
@section('content')

<div class="content-wrapper">
		    
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Customer</h1>
                  <small>Customer List</small>
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
                                 <h4>View Customer</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/addbanner')}}"> <i class="fa fa-plus"></i> View Customer
                                 </a>  
                              </div>
                              
                           </div>
                           <div class="table-responsive">
						   
                              <table id="myTable" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
									   <th>Account created</th>
                                       <th>ID</th>
									   <th>Name</th>
									   <th>Email</th>                                      
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach($userdetails as $userdetail)
                                    <tr>
									   <td>{{$userdetail->created_at}}</td>
									   <td>{{$userdetail->id}}</td>
									   <td>{{$userdetail->name}}</td>
									   <td>{{$userdetail->email}}</td>
                                       
                                       <td>
									   
									   <input type="checkbox" class="CustomerStatus btn btn-success" rel="{{$userdetail->id}}"
									   data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"
									   @if($userdetail['status']=="1") checked @endif>
									   <div id="myElem" style="display:none" class="alert alert-success" >Status Enbled
									   
									   <td>
									      <a type="button" class="btn btn-danger btn-sm" title="delete Banner" href="{{url('/admin/delete_customer/'.$userdetail->id)}}"><i class="fa fa-trash-o"></i> </a>
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