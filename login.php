<?php 

session_start();
include("database.php");
extract($_POST);

if(isset($submit)){
	$rs=mysql_query("select * from users where username='$username' and password='$password'");
	if(mysql_num_rows($rs)==1)
	{
		$des=mysql_query("select u_designation from users where username='$username' ");
		$t=mysql_fetch_row($des);
		 
		 $_SESSION['designation']=$t[0];
		 $_SESSION['username']=$username;
		 $_SESSION['add_clients_flag']=1;
		 $_SESSION['clt_flag']=1;
		 $_SESSION['cft_flag']=1;
		header("Location:dashboard.php");
		exit;
	}
	else {
		$found="N";
		}
}

?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>PRGX-login</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
    <!-- Bootsrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/add-clients.css">
		<link rel="stylesheet" href="css/materialize.min.css">
		
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

</head>
<body onload="check_login_status()">
<script type="text/javascript">
var get_params = function(search_string) {

	  var parse = function(params, pairs) {
	    var pair = pairs[0];
	    var parts = pair.split('=');
	    var key = decodeURIComponent(parts[0]);
	    var value = decodeURIComponent(parts.slice(1).join('='));

	    // Handle multiple parameters of the same name
	    if (typeof params[key] === "undefined") {
	      params[key] = value;
	    } else {
	      params[key] = [].concat(params[key], value);
	    }

	    return pairs.length == 1 ? params : parse(params, pairs.slice(1))
	  }

	  // Get rid of leading ?
	  return search_string.length == 0 ? {} : parse({}, search_string.substr(1).split('&'));
	}

	
	function check_login_status()
	{
		
		var params = get_params(location.search);
		if(params['logout']=="success")
		{
			document.getElementById('login_status').innerHTML="Please login to continue";
		}
		
	}
	// Finally, to get the param you want

</script>

<br>
<br>
<br>
<br>
<div class="container text-center">
<div id="login_status"></div>
<form name="form" method="post" action="">
	  <div class="col-md-3"></div>
		<div class="card text-center login-card col-md-6">
			<div class="col-md-12">
	
				<div class="prgxlogo" >
					<img src="images/prgxlogo.jpg" width="300px"></img>
				</div> 

				<div class="input-field">
					<input type="text" id="Username" name="username" class="text-center" required="required" width="20px"/>
					<label for="Username">Username</label>
					<div class="bar"></div>
				</div>
				<div class="input-field" width="30px">
					<input type="password" name="password" id="Password" class="text-center" required="required"/>
					<label for="Password">Password</label>
					<div class="bar"></div>
				</div>
				<br>
				
				  <?php
		  if(isset($found))
		  {
		  	echo "Invalid Username & Password";
		  }
		  ?>
		  <br>
				<button type="submit" value="Login" class="waves-effect waves-light btn" name="submit">Login</button>
			</div>

		</div>
		<div class="col-md-3"></div>
		</form>
</div>



</body>

</html>