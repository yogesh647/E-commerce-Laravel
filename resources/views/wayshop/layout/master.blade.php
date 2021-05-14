<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/front_asset/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/front_asset/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/front_asset/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/front_asset/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/front_asset/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/front_asset/css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   @include('wayshop.layout.header')

   @yield('content')

    @include('wayshop.layout.footer')
    
    
    <!-- ALL JS FILES -->
    <script src="/front_asset/js/jquery-3.2.1.min.js"></script>
    <script src="/front_asset/js/popper.min.js"></script>
    <script src="/front_asset/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/front_asset/js/jquery.superslides.min.js"></script>
    <script src="/front_asset/js/bootstrap-select.js"></script>
    <script src="/front_asset/js/inewsticker.js"></script>
    <script src="/front_asset/js/bootsnav.js."></script>
    <script src="/front_asset/js/images-loded.min.js"></script>
    <script src="/front_asset/js/isotope.min.js"></script>
    <script src="/front_asset/js/owl.carousel.min.js"></script>
    <script src="/front_asset/js/baguetteBox.min.js"></script>
    <script src="/front_asset/js/form-validator.min.js"></script>
    <script src="/front_asset/js/contact-form-script.js"></script>
    <script src="/front_asset/js/custom.js"></script>
	<script>
	$(document).ready(function () {		 
		$('#selSize').change(function(){
		  //var id=document.getElementById('selSize').value;
		  var id1=$(this).val();
		  //alert(id1);
		  $.ajax({
			 method:'get',
             url:'/get_price',
             data:{id1:id1},
             success:function(resp){
			   var arr=resp.split('#');	 
               $('#getPrice').html(" Product Price : "+arr[0]);
			   $('#price').val(arr[0]);
			 },error:function(){
                alert("error");
             }				 
			  
		  });
		  
		
		});
       $('#same-address').click(function(){
		  if(this.checked)
		  {
			  $('#shipping_name').val($('#billing_name').val());
			  $('#shipping_address').val($('#billing_address').val());
			  $('#shipping_city').val($('#billing_city').val());
			  $('#shipping_state').val($('#billing_state').val());
			  $('#shipping_country').val($('#billing_country').val());
			  $('#shipping_pincode').val($('#billing_pincode').val());
			  $('#shipping_mobile').val($('#billing_mobile').val());
		  }
		  else
		  {
              $('#shipping_name').val('');
			  $('#shipping_address').val('');
			  $('#shipping_city').val('');
			  $('#shipping_state').val('');
			  $('#shipping_country').val('');
			  $('#shipping_pincode').val('');
			  $('#shipping_mobile').val('');
		    

          }			  
	   });
       	   
       
	});
    	function selectpayment()
       {
		   
           if($('#cod').is(':checked')|| $('#paypal').is(':checked'))
		   {
			   alert('checked');
			   
		   }
		   else
		   {
              alert('please selected payment option');
			  return false;
           }			   
		  		  
       }	
	</script>
</body>

</html>