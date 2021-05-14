<html>
<head>
   <title>Account Activation</title>
</head>
<body>
    <p>
	  Hello {{$name}},<br>
	  Please click the link below.<br>
	  <a href="{{url('/account/'.$code)}}" target="blank">Activate Account</a> <br>
	  
	  Regards, <br>
      Wayshop Team	  
	</p>
</body>
</html>