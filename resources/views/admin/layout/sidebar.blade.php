<!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-product-hunt"></i><span>Product</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add_product')}}">Add Product</a></li>
                        <li><a href="{{url('/admin/view_product')}}">View Product</a></li>
                        
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Category</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add_categories')}}">Add Category</a></li>
                        <li><a href="{{url('/admin/view_categories')}}">View Category</a></li>
                        
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-image"></i><span>Banner</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/addbanner')}}">Add Banner</a></li>
                        <li><a href="{{url('/admin/viewbanner')}}">View Banner</a></li>
                        
                     </ul>
                  </li>
                  
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i><span>Coupon</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/addcoupon')}}">Add Coupon</a></li>
                        <li><a href="{{url('/admin/viewcoupon')}}">View Coupon</a></li>
                        
                     </ul>
                  </li>
				  <li class="treeview">
                     <a href="/admin/view_order">
                     <i class="fa fa-gift"></i><span>Order</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     
                  </li>
				  <li class="treeview">
                     <a href="/admin/view_customer">
                     <i class="fa fa-users"></i><span>Customer</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     
                  </li>
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->