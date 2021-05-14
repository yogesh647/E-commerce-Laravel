<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:06:57 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="csrf-token" content="{{csrf_token()}}">
      <title>@yield('title')</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="/admin_asset/assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="/admin_asset/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="/admin_asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="/admin_asset/assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="/admin_asset/assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="/admin_asset/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="/admin_asset/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="/admin_asset/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- Emojionearea -->
      <link href="/admin_asset/assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="/admin_asset/assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="/admin_asset/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
      <!-- data table serach box -->
	  <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
      
   </head>
   <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
         @include('admin.layout.header')
         @include('admin.layout.sidebar')
         @yield('content')
         @include('admin.layout.footer')
      </div>
      <!-- /.wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="/admin_asset/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      
      <!-- jquery-ui --> 
      <script src="/admin_asset/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="/admin_asset/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="/admin_asset/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="/admin_asset/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="/admin_asset/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="/admin_asset/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="/admin_asset/assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- data table in search box-->
	  <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
	  
      
	  <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="/admin_asset/assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="/admin_asset/assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
      <script src="/admin_asset/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="/admin_asset/assets/plugins/monthly/monthly.js" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="/admin_asset/assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
	  	  
      
      <script>
	   
		
	    // data table search box
	    $(document).ready( function () {
          $('#myTable').DataTable();
		  // customer status update
		  $('.CustomerStatus').change(function(){
			  var id=$(this).attr('rel');
			  if($(this).prop("checked")==true)
			  {
				 
				 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/customerStatus',
				 data:{status:'1',id:id},
				 success:function(data){
					 //alert();
					 $('#message_success').show();
					 setTimeout(function(){ $('#message_success').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
			  }
			  else
			  {
                 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/customerStatus',
				 data:{status:'0',id:id},
				 success:function(data){
					 //alert();
					 $('#message_error').show();
					 setTimeout(function(){ $('#message_error').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
              }				  
			 
			  
		  });
		  
		  
		  // coupon status update
		  $('.CouponStatus').change(function(){
			  var id=$(this).attr('rel');
			  if($(this).prop("checked")==true)
			  {
				 
				 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/CouponStatus',
				 data:{status:'1',id:id},
				 success:function(data){
					 //alert();
					 $('#message_success').show();
					 setTimeout(function(){ $('#message_success').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
			  }
			  else
			  {
                 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/CouponStatus',
				 data:{status:'0',id:id},
				 success:function(data){
					 //alert();
					 $('#message_error').show();
					 setTimeout(function(){ $('#message_error').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
              }				  
			 
			  
		  });
		  
		  // Banner status update 
		  $('.BannerStatus').change(function(){
			  var id=$(this).attr('rel');
			  if($(this).prop("checked")==true)
			  {
				 
				 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/BannerStatus',
				 data:{status:'1',id:id},
				 success:function(data){
					 //alert();
					 $('#message_success').show();
					 setTimeout(function(){ $('#message_success').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
			  }
			  else
			  {
                 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/BannerStatus',
				 data:{status:'0',id:id},
				 success:function(data){
					 //alert();
					 $('#message_error').show();
					 setTimeout(function(){ $('#message_error').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
              }				  
			 
			  
		  });
		  
		  // Product status enable and disable
		  $('.ProductStatus').change(function(){
			  var id=$(this).attr('rel');
			  if($(this).prop("checked")==true)
			  {
				 
				 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/productStatus',
				 data:{status:'1',id:id},
				 success:function(data){
					 //alert();
					 $('#message_success').show();
					 setTimeout(function(){ $('#message_success').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
			  }
			  else
			  {
                 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/productStatus',
				 data:{status:'0',id:id},
				 success:function(data){
					 //alert();
					 $('#message_error').show();
					 setTimeout(function(){ $('#message_error').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
              }				  
			 
			  
		  });
		  
		  // update status for category
		  $('.CategoryStatus').change(function(){
			  var id=$(this).attr('rel');
			  if($(this).prop("checked")==true)
			  {
				 
				 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/CategoryStatus',
				 data:{status:'1',id:id},
				 success:function(data){
					 //alert();
					 $('#message_success').show();
					 setTimeout(function(){ $('#message_success').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
			  }
			  else
			  {
                 $.ajax({ 
				 headers:{
				    	 'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
				 },
				 type: 'post',
				 url: '/admin/CategoryStatus',
				 data:{status:'0',id:id},
				 success:function(data){
					 //alert();
					 $('#message_error').show();
					 setTimeout(function(){ $('#message_error').fadeOut('slow');},2000);
				 },error:function(){
					 alert('error');
				 }
				 
			  });
              }				  
			 
			  
		  });
		  
         } );
        // add remove dynamically input type
		
     	$(document).ready( function () {	 
         var max_fields_limit      = 10; //set limit for maximum input fields
         var x = 1; //initialize counter for text box
         $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
          e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div style="display:flex"><input type="text" name="sku[]" id="sku" placeholder="SKU" style="margin-right:10px;margin-top:5px;"><input type="text" name="size[]" id="size" placeholder="SIZE" style="margin-right:10px;margin-top:5px;"><input type="text" name="stock[]" id="stock" placeholder="STOCK" style="margin-right:10px;margin-top:5px;"><input type="text" name="price[]" id="price" placeholder="PRICE" style="margin-right:10px;margin-top:5px;"><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
        });  
        $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
        })
 
		 
});
		 
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.json',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });
         
         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         }
         dash();
      

 	  
      </script>
	  
	  
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js">
	  </script>
	  
   </body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->
</html>

